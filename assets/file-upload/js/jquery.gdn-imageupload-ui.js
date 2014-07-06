/*
 * ------------------------------------------------------------------------
 * 
 * jquery.gdn-imageupload.js Version 0.1
 * jQuery Plugin Boilerplate code helps creating your custom jQuery plugins.
 *  
 * Licensed under MIT license
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright (c) 2013 Antonio Santiago
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a 
 * copy of this software and associated documentation files (the "Software"), 
 * to deal in the Software without restriction, including without limitation 
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, 
 * and/or sell copies of the Software, and to permit persons to whom the 
 * Software is furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS 
 * IN THE SOFTWARE.
 */
(function($, window, document) {
	var f_upload, modal, jcrop_api, boundx, boundy, $preview, $pcnt,
	    $pimg, xsize, ysize, $label;
	var d = {
	    x: 0,
	    y: 0,
	    w: 100,
	    h: 100
	};
	var cropCoordinates = {};
	$.widget( "gdn.imageupload", {
		
		options: {
			modalId: 'uploadModal',
			fileName: 'fileId',
			submitButton: 'submit-button',
		    fileInputWrapper: 'gdn-file-input',
		    fileInputId: 'input_file',
		    uploadUrl: 'server/php/',
		    formId: 'fileupload',
		    uploadCancel: 'btn-upload-cancel',
		    doCrop: true,
		    cropUrl: 'server/php/image_crop_and_size.php',
		    imgPreview: 'img-preview',
		    cropWidth: 100,
			cropHeight: 100,
			xs: 24,
			sm: 40,
			md: 60
		},
		
		_create: function() {
			var _options = this.options;
			var that = this;
			
			modal = $('#'+_options.modalId);
			
			this.element.on('click', function(e) {
    			e.preventDefault();
                $('#'+_options.modalId).modal('show');                 
                
            });
			
			
			modal.on('shown.bs.modal', function(e) {
				that._disableSubmit();           
			});
			
			$label = $('.'+_options.fileInputWrapper+' label');
			
			modal.on("hidden.bs.modal", function() {
		    	if (jcrop_api != undefined) {	
		            jcrop_api.release();
		            that._updatePreview(d);
		            jcrop_api.destroy();
		        }
		        $(document).off('click', '.'+that.options.submitButton);
		        $('#'+that.options.formId+' .files').empty();
		        that._showFileInputWrapper();
		        $('.preview').removeClass('preview-cropped');
		        $label.off('click');
		    });			
			
			$label.on('click', function (e) {
                $(document).on('click', '#'+_options.fileInputId, function(){});
            });

            $(document).on('click', '.'+_options.uploadCancel, function(e) {
            	that._showFileInputWrapper();	
            });
            
            $('#'+_options.formId).bind('fileuploaddestroyed', function (e, data) {
            	that._showFileInputWrapper();		    
            });

            f_upload = $('#'+_options.formId).fileupload({
                maxFileSize: 2000000,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                url: _options.uploadUrl
            }).on('fileuploadadd', function() {
                $('.'+_options.fileInputWrapper).hide();
            }).on('fileuploadalways', function(e, data) {
                var files = data.result.files;
                if (files.length) {
                    for (var i=0, file; file=files[i]; i++) {
                    	var f = file;
                        if (_options.doCrop) {
                        	$('.preview').addClass('preview-cropped');
                            $preview = $('#preview-pane');
                            $preview.removeClass('hide');
                            $('.'+_options.cropButton).removeClass('hide');
                            $pcnt = $('#preview-pane .preview-container');
                            $pimg = $('#preview-pane .preview-container img');
                            xsize = $pcnt.width();
                            ysize = $pcnt.height();
                            cropCoordinates.source = {};
                            cropCoordinates.source.file = file.url;    
                            cropCoordinates.id = file.id;
    						// width of cropped images
    						cropCoordinates.w = {
    							xs: _options.xs,
    							sm: _options.sm,
    							md: _options.md
    						};
    						var target = '#'+f.fileId; 
                            $(target).Jcrop({
                        		onChange: function(c){that._updatePreview(c);},
                        		onSelect: function(c){that._updatePreview(c);},
                        		onRelease: function(){that._disableSubmit();},
                        		aspectRatio: xsize / ysize,
                        		bgOpacity: 0.4,
                        		bgColor: 'black',
                        		addClass: 'jcrop-dark' 
                            },function(){
                                  // Use the API to get the real image size
                                var bounds = this.getBounds();
                                boundx = bounds[0];
                                boundy = bounds[1];
                                  // Store the API in the jcrop_api variable
                                jcrop_api = this;
                                cropCoordinates.source.width = boundx;
                                cropCoordinates.source.height = boundy;
                                  // Move the preview into the jcrop container for css positioning
                                $preview.appendTo(jcrop_api.ui.holder);                                
                                
                                var origin_x = 0;
                                var origin_y = 0;
                                var width = $(target).width();
                                var height = $(target).width();
                                jcrop_api.animateTo([origin_x, origin_y, width, height]);
                            });
                            
						    $(document).on('click', '.'+_options.submitButton, function(e) {
								if (jcrop_api != undefined) {	
								    $.ajax({
										url: _options.cropUrl,
										data: cropCoordinates,
										type: 'POST',
										dataType: 'JSON',
										success: function(data) {
									    	var callback_data = {deleteUrl: f.deleteUrl, deleteType: f.deleteType};
								    		that._trigger('complete', null, callback_data);						    		
										    $img = '<img src="'+data.images.image_md+'" alt="Profile picture" />';
										    $('.'+_options.imgPreview).html($img);
										    $('#'+_options.modalId).modal('hide');
										    $('.'+_options.imgPreview).append('<input type="hidden" name="'+_options.fileName+'" value="'+f.id+'">');
										}
								    });
								}
						    });
                        } else {
                            that._enableSubmit();
						    $(document).on('click', '.'+_options.submitButton, function(e) {
								$img = '<img src="'+f.thumbnailUrl+'" alt="Profile picture" />';
								$('.'+_options.imgPreview).html($img);
								$('#'+_options.modalId).modal('hide');
								$('.'+_options.imgPreview).append('<input type="hidden" name="'+_options.fileName+'" value="'+f.id+'">');
						    });
                        }
                        
                    }
                }			
            });
	    },
	    _disableSubmit: function() {
		    $('.'+this.options.submitButton).prop('disabled', true);
	    },
	    
	    _enableSubmit: function() {
		    $('.'+this.options.submitButton).prop('disabled', false);
	    },

	    _showFileInputWrapper: function() {
	        $('.'+this.options.fileInputWrapper).show();
	        this._disableSubmit();
	    },

	    _updatePreview: function(c) {
	        if (parseInt(c.w) > 0) {
	            var rx = xsize / c.w;
	            var ry = ysize / c.h;

	            $pimg.css({
	              width: Math.round(rx * boundx) + 'px',
	              height: Math.round(ry * boundy) + 'px',
	              marginLeft: '-' + Math.round(rx * c.x) + 'px',
	              marginTop: '-' + Math.round(ry * c.y) + 'px'
	            });
	            cropCoordinates.c=c;
	            this._enableSubmit();
	        }
	    },
	    
	    _hideModal: function() {	    	
	    	var that = this;	    	
		    modal.on("hidden.bs.modal", function() {
		    	if (jcrop_api != undefined) {	
		            jcrop_api.release();
		            that._updatePreview(d);
		            jcrop_api.destroy();
		        }
		        $(document).off('click', '.'+that.options.submitButton);
		        $('#'+that.options.formId+' .files').empty();
		        that._showFileInputWrapper();
		        $('.preview').removeClass('preview-cropped');
		        $label = $('.'+that.options.fileInputWrapper+' label');
		        $label.off('click');
		    });
	    },
	    
	    destroy: function() {	    	
	        $.Widget.prototype.destroy.call( this );
	    }
	});
	
})(jQuery, window, document);