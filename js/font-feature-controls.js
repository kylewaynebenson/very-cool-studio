$(document).ready(
function() {
  $('#font-family-select').data('oldVal', $('#font-family-select').val());
  $('#font-family-select').change(function() {
      var $this = $(this);
      var newClass = $this.val();
      var oldClass = $this.data('oldVal');
      $this.data('oldVal', newClass);
      $('div.type-tester div.fontselect').removeClass(oldClass).addClass(newClass);
     });

  $('#font-weight-select').data('oldVal', $('#font-weight-select').val());
  $('#font-weight-select').change(function() {
      var $this = $(this);
      var newClass = $this.val();
      var oldClass = $this.data('oldVal');
      $this.data('oldVal', newClass);
      $('div.type-tester div.fontweight').removeClass(oldClass).addClass(newClass);
  });
  // fontsize slider
  $('#font-size-slider').on('change', function () {
      var v = $(this).val();
      $('div.type-tester div.fontselect').css('font-size', v + 'px');
  });
  // tabs
  $('.tabgroup > div').hide();
  $('.tabgroup > div.active').show();
  $('.tabs a').click(function(e){
    e.preventDefault();
      var $this = $(this),
          tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
          others = $this.closest('li').siblings().children('a'),
          target = $this.attr('href');
      others.removeClass('active');
      $this.addClass('active');
      $(tabgroup).children('div').hide();
      $(target).show();
    
  });

  // update changes
  $("#font-feature-input-form").change(
    function() {
      refreshFeatures();
    }
  );
  // $("#reset").click(
  //   function() {
  //     window.location.reload();
  //   }
  // )


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
    if (sample.style.MozFontFeatureSettings === "normal") {
      sample.style.MozFontFeatureSettings = wfeatures;
    }
  }

  document.getElementById("w3cfeatures").innerHTML = wfeatures;
  sample.style.msFontFeatureSettings = wfeatures;
  sample.style.oFontFeatureSettings = wfeatures;
  sample.style.WebkitFontFeatureSettings = wfeatures;
  sample.style.FontFeatureSettings = wfeatures;
}

function refreshFeatures() {
  var defaultOff = [
    'smcp', 'c2sc', 'case',
    'lnum', 'onum', 'tnum', 'pnum',
    'frac', 'afrc',
    'liga', 'dlig', 'hlig', 'clig',
    'swsh', 'calt', 'hist',
    'ss01', 'ss02', 'ss03', 'ss04', 'ss05', 'ss06', 'ss07',
  ];

  var defaultOn = [ 'liga' ];

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
  document.getElementById("msfeatures").innerHTML = wfeatures;
  document.getElementById("ofeatures").innerHTML = wfeatures;
  document.getElementById("webkitfeatures").innerHTML = wfeatures;
  document.getElementById("w3cfeatures").innerHTML = wfeatures;

  refreshSample();
}
  refreshFeatures();
});