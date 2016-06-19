  /* Configure at https://www.betterplace.org/de/projects/36608-ermogliche-gefluchteten-ein-studium/manage/iframe_donation_form */

  var _bp_iframe        = _bp_iframe || {};
  _bp_iframe.project_id = 36608; /* REQUIRED */
  _bp_iframe.lang       = 'de'; /* Language of the form - @Adam: please try'en'*/


  // _bp_iframe.width = 600; /* Custom iframe-tag-width, integer @Adam: Don't now what it does - we leave it */
   _bp_iframe.color = '002882'; /* Button and banderole color, hex without "#"  - @Adam: Here Kiron blue 002882 - in case you need other notations http://www.colorhexa.com/002882*/
   _bp_iframe.background_color = 'fff'; /* Background-color, hex without "#" */
   _bp_iframe.default_amount = 20; /* Donation-amount, integer 1-99 - @Adam: 20 is the default for us*/
  // _bp_iframe.default_data_transfer_accepted = false; /* true (default), false @Adam: if I read this corretly we leaf this "auskommentiert" as default is true aka we will get data from donor transfered */
   _bp_iframe.recurring_interval = 'monthly'; /* OK. Interval for recurring donations, string out of ["single", "monthly", "quarter_yearly", "half_yearly", "yearly"] */
  (function() {
    var bp = document.createElement('script'); bp.type = 'text/javascript'; bp.async = true;
    bp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'asset1.betterplace.org/assets/load_donation_iframe.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(bp, s);
  })();
