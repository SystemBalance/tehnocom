var section = {

  opts: {
    section: '.js-section',
    tabs: '.js-tabs a',
    tabsActiveClass: 'd_activetab'
  },

  init: function() {
    if (window.location.hash) section.showSection(window.location.hash);
    section.tabsHandler();
  },

  showSection: function(hash) {
    $(section.opts.section).css('display', 'none');
    $(section.opts.section + '[data-id=' + hash + ']').css('display', 'block');
    $(section.opts.tabs).removeClass(section.opts.tabsActiveClass);
    $(section.opts.tabs + '[href=' + hash + ']').addClass(section.opts.tabsActiveClass);
  },

  tabsHandler: function() {
    $(section.opts.tabs).click(function() {
      var $this = $(this),
          hash = $this.attr('href');
      section.showSection(hash);
    });
  }

};

section.init();

$(function() {
  if ($('select').length) $('select').selectric();
});