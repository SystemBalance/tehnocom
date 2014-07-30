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

var add2basket = {

  opts: {
    buy: '.js-add2basket',
    modal: '.js-add2basket-modal'
  },

  init: function() {
    add2basket.buyHandler();
    add2basket.modalCreate();
    add2basket.modalHandler();
  },

  buyHandler: function() {
    $(add2basket.opts.buy).click(function() {
      var url = $(this).attr('href');
      $.ajax({
        type: 'post',
        url: url,
        cached: false,
        success: function() {
          add2basket.modalShow();
          setTimeout(add2basket.modalHide, 3000);
        }
      });
      return false;
    });
  },

  modalCreate: function() {
    var modal = '';
    modal += '<div class="add2basket-modal js-add2basket-modal">';
    modal += '<div class="add2basket-modal__in">';
    modal += 'Товар успешно добавлен в корзину!';
    modal += '</div></div>';
    $('body').appendTo($(modal));
  },

  modalHandler: function() {
    $(add2basket.opts.modal).click(add2basket.modalHide);
  },

  modalShow: function() {
    $(add2basket.opts.modal).css('display', 'block');
  },

  modalHide: function() {
    $(add2basket.opts.modal).css('display', 'none');
  }

};

add2basket.init();

$(function() {
  if ($('select').length) $('select').selectric();
});