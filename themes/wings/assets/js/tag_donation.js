 goog_snippet_vars = function() {
   var w = window;
   w.google_conversion_id = 923573971;
   w.google_conversion_label = "FKxECPTi0WUQ072yuAM";
   w.google_remarketing_only = false;
 }
 // DO NOT CHANGE THE CODE BELOW.
 goog_report_conversion = function(url) {
   goog_snippet_vars();
   window.google_conversion_format = "3";
   var opt = new Object();
   opt.onload_callback = function() {
   if (typeof(url) != 'undefined') {
     window.location = url;
   }
 }
 var conv_handler = window['google_trackConversion'];
 if (typeof(conv_handler) == 'function') {
   conv_handler(opt);
 }
}
