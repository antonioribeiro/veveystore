<?php

namespace App\Providers;

use View;
use Auth;
use Config;
use Language;
use Illuminate\Support\ServiceProvider;
use PragmaRX\Support\Inflectors\Inflector;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer('*', function($view)
		{
			$view->with('html_lang', Language::getLocale());

			$view->with('html_attributes', '');

			$view->with('html_title', Config::get('app.name'));

			$view->with('html_keywords', 'politico,clipping,politics');

			$view->with('html_meta_tags', ['<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->']);

			$view->with('html_description', '');

			$view->with('html_author', 'Antonio Carlos Ribeiro [https://antoniocarlosribeiro.com]');

			$view->with('html_viewport', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no');

			$view->with('html_body_attributes', []);

			$view->with('html_body_show_main_header', true);

//			$view->with('html_navigation', app('ConsultorioDigital\Services\Navigation\Page')->get());

//			$view->with('html_breadcrumbs', app('ConsultorioDigital\Services\Navigation\Breadcrumbs')->get());
		});

		View::composer('*', function($view)
		{
			$view->with('site_name', strtoupper(Config::get('app.name')));

			$view->with('app_name_caps', Config::get('app.name'));

			$view->with('current_user', Auth::user());

			$view->with('assets', asset('/'));

			$view->with('assets_bower', asset('vendor'));

			$view->with('assets_main', asset('/'));

			$view->with('assets_layout', asset('assets'));

			$view->with('language_locale', Language::getLocale());

			$view->with('language_country_code', Language::getCountryCode());

			$view->with('language_country_name', Language::getCountryName());

			$view->with('language_name', Language::getLanguageName());
		});

		/**
		 * Create an $icon_name view shared variable for each icon in the system
		 */
		View::composer('*', function($view)
		{
			if ( ! $icons = Config::get('icons'))
			{
				throw new \Exception('Please create the file config/icons.php');
			}

			foreach ($icons as $key => $icon)
			{
				$view->with("icon_{$key}", $icon);
			}
		});

		View::composer('*', function($view)
		{
			$view->with('caption_client', strtolower(Auth::check() ? Inflector::singular(Auth::user()->present()->clientFieldName) : 'client'));
			$view->with('caption_Client', Auth::check() ? Inflector::singular(Auth::user()->present()->clientFieldName) : 'client');

			$view->with('caption_clients', strtolower(Auth::check() ? Inflector::plural(Auth::user()->present()->clientFieldName) : 'client'));
			$view->with('caption_Clients', Auth::check() ? Inflector::plural(Auth::user()->present()->clientFieldName) : 'client');

			$view->with('date_format', Language::getDateFormat());
		});


//		/**
//		 * Calendar
//		 */
//		View::composer('*', function($view)
//		{
//			$user = Auth::user();
//
//			$view->with("default_events_url", $user ? route('events.user', $user->id) : '/');
//		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
