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

    /**
     * Store the plugin name in a variable. It helps you if later decide to 
     * change the plugin's name
     * @type {String}
     */
    var pluginName = 'imageupload';
    
    var jcrop_api, boundx, boundy, $preview, $pcnt,
    $pimg, xsize, ysize, $label;
	var d = {
	    x: 0,
	    y: 0,
	    w: 100,
	    h: 100
	};
	var cropCoordinates = {};
 
    /**
     * The plugin constructor
     * @param {DOM Element} element The DOM element where plugin is applied
     * @param {Object} options Options passed to the constructor
     */
    function Plugin(element, options) {

        // Store a reference to the source element
        this.el = element;

        // Store a jQuery reference  to the source element
        this.$el = $(element);

        // Set the instance options extending the plugin defaults and
        // the options passed by the user
        this.options = $.extend({}, $.fn[pluginName].defaults, options);

        // Initialize the plugin instance
        this.init();
        return this;
    }

    /**
     * Set up your Plugin protptype with desired methods.
     * It is a good practice to implement 'init' and 'destroy' methods.
     */
    Plugin.prototype = {
        
        /**
         * Initialize the plugin instance.
         * Set any other attribtes, store any other element reference, register 
         * listeners, etc
         *
         * When bind listerners remember to name tag it with your plugin's name.
         * Elements can have more than one listener attached to the same event
         * so you need to tag it to unbind the appropriate listener on destroy:
         * 
         * @example
         * this.$someSubElement.on('click.' + pluginName, function() {
         *      // Do something
         * });
         *         
         */
        init: function() {
    		var settings = this.options;
    		var that = this.$el;
    		this.$el.on('click.' + pluginName, function(e) {
    			e.preventDefault();
                $('#'+settings.modalId).modal('show');
                disableSubmit(that);                	
            });
    		
    		$label = $('.'+settings.fileInputWrapper+' label');
            $label.on('click.' + pluginName, function () {
                $(document).on('click.' + pluginName, '#'+settings.fileInputId, function(){});
            });

            $(document).on('click.' + pluginName, '.'+settings.uploadCancel, function() {
               showFileInputWrapper.call(this);
            });
            
            $('#'+settings.formId).bind('fileuploaddestroyed', function (e, data) {
                showFileInputWrapper.call(this);		    
            });

            $('#'+settings.formId).fileupload({
            	singleFileUploads: false,
                maxFileSize: 2000000,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                url: settings.uploadUrl
            }).on('fileuploadadd', function() {
                $('.'+settings.fileInputWrapper).hide();
            }).on('fileuploadalways', function(e, data) {
                var files = data.result.files;
                if (files.length) {
                    for (var i=0, file; file=files[i]; i++) {
                    	var f = file;
                        if (settings.doCrop) {
                        	$('.preview').addClass('preview-cropped');
                            $preview = $('#preview-pane');
                            $preview.removeClass('hide');
                            $('.'+settings.cropButton).removeClass('hide');
                            $pcnt = $('#preview-pane .preview-container');
                            $pimg = $('#preview-pane .preview-container img');
                            xsize = $pcnt.width();
                            ysize = $pcnt.height();
                            cropCoordinates.source = {};
                            cropCoordinates.source.file = file.url;    
                            cropCoordinates.id = file.id;
    						// width of cropped images
    						cropCoordinates.w = {
    							xs: settings.xs,
    							sm: settings.sm,
    							md: settings.md
    						};
    						var target = '#'+f.fileId; 
                            $(target).Jcrop({
                        		onChange: updatePreview,
                        		onSelect: updatePreview,
                        		onRelease: disableSubmit,
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
                                
//                                var origin_x = ( $('#target').width() / 2) - (settings.cropWidth / 2);
//                                var origin_y = ( $('#target').height() / 2) - (settings.cropHeight / 2);
//                                var width = origin_x + settings.cropWidth;
//                                var height = origin_x + settings.cropHeight;
                                var origin_x = 0;
                                var origin_y = 0;
                                var width = $(target).width();
                                var height = $(target).width();
                                jcrop_api.animateTo([origin_x, origin_y, width, height]);
                            });
                            
						    $(document).on('click', '.'+settings.submitButton, function(e) {
								if (jcrop_api != undefined) {	
								    $.ajax({
										url: settings.cropUrl,
										data: cropCoordinates,
										type: 'POST',
										dataType: 'JSON',
										success: function(data) {	
								    		var callback_data = {deleteUrl: f.deleteUrl, deleteType: f.deleteType};
								    		that.trigger('complete', callback_data);
										    $img = '<img src="'+data.images.image_md+'" alt="Profile picture" />';
										    $('.'+settings.imgPreview).html($img);
										    $('#'+settings.modalId).modal('hide');
										    $('.'+settings.imgPreview).append('<input type="hidden" name="'+settings.fileName+'" value="'+f.id+'">');
										}
								    });
								}
						    });
                        } else {
                            enableSubmit();
						    $(document).on('click', '.'+settings.submitButton, function(e) {
								$img = '<img src="'+f.thumbnailUrl+'" alt="Profile picture" />';
								$('.'+settings.imgPreview).html($img);
								$('#'+settings.modalId).modal('hide');
								$('.'+settings.imgPreview).append('<input type="hidden" name="'+settings.fileName+'" value="'+f.id+'">');
						    });
                        }
                        
                    }
                }			
                });
        },

        /**
         * The 'destroy' method is were you free the resources used by your plugin:
         * references, unregister listeners, etc.
         *
         * Remember to unbind for your event:
         *
         * @example
         * this.$someSubElement.off('.' + pluginName);
         *
         * Above example will remove any listener from your plugin for on the given
         * element.
         */
        destroy: function() {

            // Remove any attached data from your plugin
            this.$el.removeData();
            this.$el.off('.' + pluginName);
        },

        /**
         * Write public methods within the plugin's prototype. They can 
         * be called with:
         *
         * @example
         * $('#element').jqueryPlugin('somePublicMethod','Arguments', 'Here', 1001);
         *  
         * @param  {[type]} foo [some parameter]
         * @param  {[type]} bar [some other parameter]
         * @return {[type]}
         */
        somePublicMethod: function(foo, bar) {

            // This is a call to a pseudo private method
            this._pseudoPrivateMethod();

            // This is a call to a real private method. You need to use 'call' or 'apply'
            privateMethod.call(this);
        },
       
        /**
         * Another public method which acts as a getter method. You can call as any usual
         * public method:
         *
         * @example
         * $('#element').jqueryPlugin('someGetterMethod');
         *
         * to get some interesting info from your plugin.
         * 
         * @return {[type]} Return something
         */
        someGetterMethod: function() {

        },

        /**
         * You can use the name convention functions started with underscore are
         * private. Really calls to functions starting with underscore are 
         * filtered, for example:
         * 
         *  @example
         *  $('#element').jqueryPlugin('_pseudoPrivateMethod');  // Will not work
         */
        _pseudoPrivateMethod: function() {
            
        }
    };

    


    /**
     * This is were we register our plugin withint jQuery plugins.
     * It is a plugin wrapper around the constructor and prevents agains multiple
     * plugin instantiation (soteing a plugin reference within the element's data)
     * and avoid any function starting with an underscore to be called (emulating
     * private functions).
     *
     * @example
     * $('#element').jqueryPlugin({
     *     defaultOption: 'this options overrides a default plugin option',
     *     additionalOption: 'this is a new option'
     * });
     */
    $.fn[pluginName] = function(options) {
        var args = arguments;

        if (options === undefined || typeof options === 'object') {
            // Creates a new plugin instance, for each selected element, and
            // stores a reference withint the element's data
            return this.each(function() {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
                }
            });
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            // Call a public pluguin method (not starting with an underscore) for each 
            // selected element.
            if (Array.prototype.slice.call(args, 1).length == 0 && $.inArray(options, $.fn[pluginName].getters) != -1) {
                // If the user does not pass any arguments and the method allows to
                // work as a getter then break the chainability so we can return a value
                // instead the element reference.
                var instance = $.data(this[0], 'plugin_' + pluginName);
                return instance[options].apply(instance, Array.prototype.slice.call(args, 1));
            } else {
                // Invoke the speficied method on each selected element
                return this.each(function() {
                    var instance = $.data(this, 'plugin_' + pluginName);
                    if (instance instanceof Plugin && typeof instance[options] === 'function') {
                        instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                    }
                });
            }
        }
    };
    
    var disableSubmit = function(obj) {
    	console.log(obj);
	    $('.'+obj.options.submitButton).prop('disabled', true);
    };

    /**
     * Names of the pluguin methods that can act as a getter method.
     * @type {Array}
     */
    $.fn[pluginName].getters = ['someGetterMethod'];

    /**
     * Default options
     */
    var defaults = $.fn[pluginName].defaults = {
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
    };
    
    var options = $.extend({}, $.fn[pluginName].defaults, $.fn[pluginName].options); 
    
    
    
    var enableSubmit = function() {
	    $('.'+options.submitButton).prop('disabled', false);
    };

    var showFileInputWrapper = function() {
        $('.'+options.fileInputWrapper).show();
        disableSubmit();
    };

    var updatePreview = function(c) {
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
            enableSubmit();
        }
    };

    var modal = $('#'+options.modalId);
    modal.on("hidden.bs.modal", function() {
        if (jcrop_api != undefined) {	
            jcrop_api.release();
            updatePreview(d);
            jcrop_api.destroy();
        }
        $(document).off('click', '.'+options.submitButton);
        $('.files').empty();
        $('.'+options.fileInputWrapper).show();
        disableSubmit();
        $('.preview').removeClass('preview-cropped');
    });

})(jQuery, window, document);