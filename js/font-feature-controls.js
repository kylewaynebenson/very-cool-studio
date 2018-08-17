$(document).ready(
function() {
	$('#font-family-select').data('oldVal', $('#font-family-select').val());
	$('#font-family-select').change(function() {
	    var $this = $(this);
	    var newClass = $this.val();
	    var oldClass = $this.data('oldVal');
	    $this.data('oldVal', newClass);
	    $('div.type-tester span.fontselect').removeClass(oldClass).addClass(newClass);
	   });

	$('#font-weight-select').data('oldVal', $('#font-weight-select').val());
	$('#font-weight-select').change(function() {
	    var $this = $(this);
	    var newClass = $this.val();
	    var oldClass = $this.data('oldVal');
	    $this.data('oldVal', newClass);
	    $('div.type-tester span.fontweight').removeClass(oldClass).addClass(newClass);
	});
	// fontsize slider
	$('#font-size-slider').on('change', function () {
	    var v = $(this).val();
	    $('div.type-tester span.fontselect').css('font-size', v + 'px')
	});
	// hide controls and set heading images to closed
	$('.group').hide();
	$('#font-feature-controls h3').addClass("closed");


	// show/hide control group
	$('#font-feature-controls h3').click(
		function() {
			$(this).toggleClass("closed");
			$(this).next(".group").slideToggle("fast");
		}
	);

	// update changes
	$("#font-feature-input-form").change(
		function() {
			refreshFeatures();
		}
	)
	$("#reset").click(
		function() {
			window.location.reload();
		}
	)
	refreshFeatures();
})

var defaultOff = [
  'smcp', 'c2sc',
  'lnum', 'onum', 'tnum', 'pnum',
  'frac', 'afrc',
  'zero', 'nalt',
  'kern',
  'liga', 'dlig', 'hlig', 'clig',
  'swsh', 'calt', 'hist',
  'ss01', 'ss02', 'ss03', 'ss04', 'ss05',
];

var defaultOn = [ 'liga', 'kern' ];

function refreshFeatures() {

  var mfeatures = "";
  var wfeatures = "";
  var f;
  for (f in defaultOn) {
    if (!document.getElementById(defaultOn[f]).checked) { mfeatures += defaultOn[f] + "=0, "; }
    if (!document.getElementById(defaultOn[f]).checked) { wfeatures += "&quot;" + defaultOn[f] + "&quot; 0, "; }
  }
  for (f in defaultOff) {
    if (document.getElementById(defaultOff[f]).checked) { mfeatures += defaultOff[f] + "=1, "; }
    if (document.getElementById(defaultOff[f]).checked) { wfeatures += "&quot;" + defaultOff[f] + "&quot; 1, "; }
  }
  mfeatures = mfeatures.substring(0, mfeatures.length - 2);
  wfeatures = wfeatures.substring(0, wfeatures.length - 2);
  document.getElementById("mozfeatures").innerHTML = mfeatures;
  document.getElementById("mozfeatures13").innerHTML = wfeatures;
  document.getElementById("msfeatures").innerHTML = wfeatures;
  document.getElementById("ofeatures").innerHTML = wfeatures;
  document.getElementById("webkitfeatures").innerHTML = wfeatures;
  document.getElementById("w3cfeatures").innerHTML = wfeatures;

  refreshSample();

};

function refreshSample() {

  var sample = document.getElementById("type-tester-editable");

  var wfeatures = document.getElementById("webkitfeatures").innerHTML;

  if ("MozFontFeatureSettings" in sample.style) {
    // first, reset the property to normal
    sample.style.MozFontFeatureSettings = "normal";

    // old Firefox syntax
    var mfeatures = document.getElementById("mozfeatures").innerHTML;
    sample.style.MozFontFeatureSettings = "'" + mfeatures + "'";

    // if that failed setting will be "normal", use standard syntax
    if (sample.style.MozFontFeatureSettings == "normal") {
      sample.style.MozFontFeatureSettings = wfeatures;
    }
  }

  document.getElementById("w3cfeatures").innerHTML = wfeatures;
  sample.style.msFontFeatureSettings = wfeatures;
  sample.style.oFontFeatureSettings = wfeatures;
  sample.style.WebkitFontFeatureSettings = wfeatures;
  sample.style.FontFeatureSettings = wfeatures;
};

