Dropzone.options.dropzoneInput = {
	url: '/api/file/upload',
	dictDefaultMessage: 'Arraste e solte as imagens aqui.',
	dictFallbackMessage: 'Seu browser não suporta uploads via "arraste e solte".',
	dictFallbackText: 'Por favor use o formulário abaixo para fazer upload.',
	dictInvalidFileType: 'Tipo de arquivo inválido.',
	dictFileTooBig: 'O arquivo tem @{{filesize}} e é grande demais, por favor faça upload de arquivos com no máximo {{maxFilesize}}.',
	dictResponseError: 'Ocorreu o erro @{{statusCode}} ao tentar comunicar com o servidor.',
	dictCancelUpload: 'Cancelar upload',
	dictCancelUploadConfirmation: 'Deseja cancelar o upload?',
	dictRemoveFile: 'Remover arquivo',
	dictMaxFilesExceeded: 'Número máximo de arquivos excedido.',
	paramName: "images",
	uploadMultiple: true,
	acceptedFiles: 'image/*',
	maxFilesize: 3, // MB
};
