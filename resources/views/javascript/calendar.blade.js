// full calendar

var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

var hdr = {
	left: 'title',
	center: 'month,agendaWeek,agendaDay',
	right: 'prev,today,next'
};

var generatePostData = function(event, delta)
{
	var data = {
		event_id: event.eventId,
		client_id: event.clientId,
        color: event.color,
		office_room_id: event.roomId,
		title: event.title,
		description: event.description,
		_token: '{{csrf_token()}}',
	};

	if (delta)
	{
		data.start = moment(event.start).subtract(delta).toISOString();
		data.end = moment(event.end).subtract(delta).toISOString();

		data.updated_start = event.start.toISOString();
		data.updated_end = event.end.toISOString();
	}
	else
	{
		data.start = event.start.toISOString();
		data.end = event.end.toISOString();
	}

	return data;
};

var postAndRenderEvent = function(event, delta)
{
	postData = generatePostData(event, delta);

	$.ajax({
		url: "{{ $update_url }}",

		type: "POST",

		data: postData,

		success: function(result)
		{
			if (result.success)
			{
				event.eventId = result.event_id;

				jQuery('#calendar').fullCalendar('renderEvent', event, true);
			}
		},

		statusCode:
		{
			422: function()
			{
				alert("{{t('paragraphs.validation-error')}}");
			}
		},

	});
};

var initDrag = function (e) {
	// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
	// it doesn't need to have a start or end

	var eventObject = {
		eventId: $.trim(e.children('span').attr('data-event-id')),
		clientId: $.trim(e.children('span').attr('data-client-id')),
		roomId: $.trim(e.children('span').attr('data-room-id')),
		title: $.trim(e.children().text()), // use the element's text as the event title
		description: $.trim(e.children('span').attr('data-description')),
		icon: $.trim(e.children('span').attr('data-icon')),
		className: $.trim(e.children('span').attr('class')), // use the element's children as the event class
        color: $.trim(e.children('span').attr('data-color')),
		backgroundColor: $.trim(e.children('span').attr('data-background-color')),
		textColor: $.trim(e.children('span').attr('data-text-color')),
		start: $.trim(e.children('span').attr('data-start')),
		end: $.trim(e.children('span').attr('data-end')),
		allDay: $.trim(e.children('span').attr('data-allday')) == 'true',
	};

	// store the Event Object in the DOM element so we can get to it later
	e.data('eventObject', eventObject);

	// make the event draggable using jQuery UI
	e.draggable({
		zIndex: 999,
		revert: true, // will cause the event to go back to its
		revertDuration: 0 //  original position after the drag
	});
};

/* initialize the external events
 -----------------------------------------------------------------*/

jQuery('#external-events > li').each(function ()
{
	initDrag(jQuery(this));
});

jQuery('#add-event').click(function ()
{
	var title = jQuery('#title').val(),
		priority = jQuery('input:radio[name=priority]:checked').val(),
		description = jQuery('#description').val(),
		icon = jQuery('input:radio[name=iconselect]:checked').val();

	addEvent(title, priority, description, icon);
});


/* initialize the calendar
 -----------------------------------------------------------------*/

jQuery('#calendar').fullCalendar({

	defaultView: 'agendaWeek',

	header: hdr,

	height: "auto",

	allDaySlot: false,

	editable: {{ ! isset($editable) || ! $editable ? "false" : "true" }},

	droppable: {{ ! isset($editable) || ! $editable ? "false" : "true" }},

	hiddenDays: [{{ $hidden_days }}],

	lang: 'pt-br',

	minTime: '{{ $min_time }}',

	maxTime: '{{ $max_time }}',

	timeFormat:
	{
		// for agendaWeek and agendaDay
		agenda: 'h:mm', // 5:00

		// for all other views
		'': 'h(:mm)t'  // 7p
	},

	buttonText:
	{
		prev: '<i class="fa fa-chevron-left"></i>',
		next: '<i class="fa fa-chevron-right"></i>'
	},

	drop: function (date)
	{
		start = date;
		end = moment(date).add(1, 'hours');

		// retrieve the dropped element's stored Event Object
		var originalEventObject = jQuery(this).data('eventObject');

		// we need to copy it, so that multiple events don't have a reference to the same object
		var copiedEventObject = $.extend({}, originalEventObject);

		// assign it the date that was reported
		copiedEventObject.start = start;
		copiedEventObject.end  = end;
		copiedEventObject.allDay = false;

		postAndRenderEvent(copiedEventObject);
	},

	eventDrop: function(event, delta, revertFunc, jsEvent, ui, view)
	{
		postAndRenderEvent(event, delta);
	},

	eventResize: function(event, delta, revertFunc)
	{
		postAndRenderEvent(event, delta);
	},

	select: function (start, end, allDay)
	{
		var title = prompt('Event Title:');

		if (title)
		{
			calendar.fullCalendar('renderEvent',
				{
					title: title,
					start: start,
					end: end,
					allDay: allDay
				},
				true // make the event "stick"
			);
		}

		calendar.fullCalendar('unselect');
	},

	events: function()
	{
		updateFullCalendar('#calendar', "{{ $events_url or $default_events_url }}");
	},

    eventClick: function(calEvent, jsEvent, view)
	{
		if ( ! calEvent.editable)
		{
			if (calEvent.roomId.length > 0)
			{
				loadURL("{!! route('offices.rooms.calendar') !!}/" + calEvent.roomId, jQuery('#content'));
			}

			return false;
		}

		jQuery('#edit-event-modal').modal(
		{
			show: true,
			remote: '{{ route("events.edit.modal") }}/' + calEvent.eventId
		});

        //alert('Event: ' + calEvent.title);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //alert('View: ' + view.name);
    },

	eventRender: function (event, element, icon)
	{
		if ( ! event.description == "")
		{
			element
				.find('.fc-event-title')
				.append("<br/><span class='ultra-light'>" + event.description + "</span>");
		}

		if ( ! event.icon == "")
		{
			element
				.find('.fc-event-title')
				.append("<i class='air air-top-right fa " + event.icon + " '></i>");
		}
	},

	windowResize: function (event, ui)
	{
		jQuery('#calendar').fullCalendar('render');
	}
});

/* hide default buttons */
jQuery('.fc-header-right, .fc-header-center').hide();

jQuery('#calendar-buttons #btn-prev').click(function () {
	jQuery('.fc-button-prev').click();
	return false;
});

jQuery('#calendar-buttons #btn-next').click(function () {
	jQuery('.fc-button-next').click();
	return false;
});

jQuery('#calendar-buttons #btn-today').click(function () {
	jQuery('.fc-button-today').click();
	return false;
});

jQuery('#mt').click(function () {
	jQuery('#calendar').fullCalendar('changeView', 'month');
});

jQuery('#ag').click(function () {
	jQuery('#calendar').fullCalendar('changeView', 'agendaWeek');
});

jQuery('#td').click(function () {
	jQuery('#calendar').fullCalendar('changeView', 'agendaDay');
});

/// Destroy the modal on close
jQuery('body').on('hidden.bs.modal', '.destroyOnClose', function ()
{
	jQuery(this).find('.modal-content').html(
		'<div class="modal-body"><div class="row"><h1>{{'captions.loading'}}...</h1></div></div>'
	);
});
