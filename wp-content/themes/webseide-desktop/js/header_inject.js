if (window) {
  window.tlsHeaderApp = {
    snippets: {},
    timer: null,

    init: function () {
      var header = $('head');
      window.tlsShopUrl = window.tlsShopUrl || '';
      window.tlsSubShopUrl = window.tlsSubShopUrl || '';
      window.tlsHeaderWidgetCss = window.tlsHeaderWidgetCss || '/custom/plugins/ZinitBachelorprint/Resources/views/frontend/_public/src/css/header_inject.css?v=1.1.0';
      window.tlsHeaderElSelector = window.tlsHeaderElSelector || '#header';
      window.tlsMenuElSelector = window.tlsMenuElSelector || '#menu';
      window.tlsConfiguratorUrl = window.tlsConfiguratorUrl || window.location.href + '24h-online-shop/';

      //header.append('<link rel="stylesheet" href="' + tlsShopUrl + '/custom/plugins/ZinitBachelorprint/Resources/views/frontend/_public/src/flip_clock/flipclock.css" type="text/css" />');
      //header.append('<link rel="stylesheet" href="' + tlsShopUrl + tlsHeaderWidgetCss + '" type="text/css" />');
      //header.append('<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,500,700,700i,900,900i" rel="stylesheet">');

      this.getSnippets().done(function () {
        $.getScript(
          //tlsShopUrl + '/custom/plugins/ZinitBachelorprint/Resources/views/frontend/_public/src/flip_clock/flipclock.min.js',
          bpLocalize.configurator['config_' + bpLocalize.langCode].flipclockJS,
          function() {
            this.initDelivery();
          }.bind(this)
        );
        this.initMenu();

        // Check login.
        this.postMessage({
          type: 'checkLogin',
          shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
        });
      }.bind(this));
    },

    getSnippets: function () {
      return $.get(tlsShopUrl + tlsSubShopUrl + '/widgets/online-shop/getSnippets', function (data) {
        if (data && data.list) {
          this.snippets = data.list;
        }
      }.bind(this));
    },

    initDelivery: function () {
      this.addDeliveryHtml();
      var popup = $('.tls-delivery .tls-js-popup');
      if (this.isMobile()) {
        $('.tls-delivery .tls-box_info').click(function () {
          popup.toggle();
        });
      } else {
        $('.tls-delivery .tls-box_info').hover(function() {
          popup.show();
        }, function() {
          popup.hide();
        });
      }

      popup.on('click', '.tls-del-calc', function () {
        this.goTo('deliveryCalc');
      }.bind(this));

      this.updateTimer();

      // Timer needs to sync every 15 min!
      setInterval(function () {
        this.updateTimer();
      }.bind(this), 1000 * 60 * 15);
    },

    updateTimer: function () {
      $.get(tlsShopUrl + tlsSubShopUrl + '/widgets/online-shop/getDelivery', function (data) {
        if (data && data.timer) {
          FlipClock.Lang.English = {
            'years': 'Years',
            'months': 'Months',
            'days': data.timer.d.label,
            'hours': data.timer.h.label,
            'minutes': data.timer.i.label,
            'seconds': data.timer.s.label
          };
          var time = data.timer.h.val * 3600 + data.timer.i.val * 60 + data.timer.s.val;

          if (!this.timer) {
            var $timer = $('.tls-delivery .tls-js-hours');
            if ($timer.length) {
              this.timer = $timer.FlipClock(time, { countdown: true });
            }
          } else {
            this.timer.setTime(time);
          }

          if (data.active && data.active.delivery && data.active.delivery.minDate) {
            $('.tls-delivery .tls-js-text').html(data.active.delivery.minDate.dateAsText);
          }

          $('.tls-delivery .tls-js-popup').html(this.getCountriesHtml(data.countries));
        }
      }.bind(this));
    },

    initMenu: function () {
      $(window.tlsMenuElSelector).html(this.getCartHtml());

      var menu = $('.tls-menu');
      var popupCart = $('.tls-cart .tls-js-popup');
      if (this.isMobile()) {
        $('.tls-cart').click(function () {
          popupCart.toggle();
        });
      } else {
        $('.tls-cart').hover(function() {
          popupCart.show();
        }, function() {
          popupCart.hide();
        });
      }
      popupCart.on('click', '.tls-close', function (e) {
        popupCart.hide();
        e.stopPropagation();
      });

      if (this.isMobile()) {
        menu.on('click', '.tls-account', function () {
          $('.tls-account .tls-js-popup').toggle();
        });
      } else {
        menu.on('mouseenter', '.tls-account', function () {
          $('.tls-account .tls-js-popup').show();
        }).on('mouseleave', '.tls-account', function () {
          $('.tls-account .tls-js-popup').hide();
        });
      }
      menu.on('click', '.tls-btn.tls-login-btn, .tls-btn.tls-registr-btn, .tls-link.tls-acc-btn', function () {
        this.goTo('account');
      }.bind(this));
      menu.on('click', '.tls-link.tls-order-btn', function () {
        this.goTo('orders');
      }.bind(this));
      menu.on('click', '.tls-link.tls-logout-btn', function () {
        this.postMessage({
          type: 'logout',
          shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
        });
      }.bind(this));
      menu.on('click', '.tls-fav', function () {
        this.goTo('note');
      }.bind(this));

      popupCart.find('.tls-btn.tls-checkout-btn').click(function () {
        this.goTo('checkout');
      }.bind(this));
      popupCart.find('.tls-btn.tls-cart-btn').click(function () {
        this.goTo('cart');
      }.bind(this));
      popupCart.on('click', '.tls-remove', function (el) {
        this.postMessage({
          type: 'removeItem',
          shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
          id: $(el.currentTarget).data('id'),
        });
      }.bind(this));

      // Listen for cross-frame messages.
      window.addEventListener('message', this.parseMessage.bind(this), false);

      // Load initial data.
      this.postMessage({
        type: 'updateCart',
        shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
      });
      this.postMessage({
        type: 'updateUserMenu',
        shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
      });
    },

    postMessage: function (data) {
      var iframeEl = window.document.getElementById('tlsServiceFrame');
      if (iframeEl) {
        iframeEl.contentWindow.postMessage(data, '*');
      }
    },

    parseMessage: function (event) {
      if (event.data && event.data.type) {
        switch (event.data.type) {
          case 'scrollTop':
            $('html, body').animate({scrollTop: 0}, 500);
            break;
          case 'updateCart':
            this.updateCart(event.data.data);
            break;
          case 'updateUserMenu':
            this.updateUserMenu(event.data.data);
            break;
          case 'refreshTimer':
            this.updateTimer();
            break;
          case 'refreshUserMenu':
            this.postMessage({
              type: 'updateUserMenu',
              shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
            });
            break;
          case 'refreshCart':
            this.postMessage({
              type: 'updateCart',
              shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
            });
            break;
          case 'refreshHeader':
            // Update delivery info and timer.
            this.updateTimer();

            // Update cart.
            this.postMessage({
              type: 'updateCart',
              shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
            });

            // Update login and fav.
            this.postMessage({
              type: 'updateUserMenu',
              shopUrl: window.tlsShopUrl + window.tlsSubShopUrl,
            });
            break;
        }
      }
    },

    updateUserMenu: function (data) {
      if (data) {
        $('.tls-account, .tls-fav').remove();
        $('.tls-menu').prepend($(data));
      }
    },

    updateCart: function (data) {
      var badge = $('.tls-cart .tls-badge');
      var popup = $('.tls-cart .tls-js-popup .tls-ajax');
      if (typeof data === 'undefined') {
        data = '';
      }
      popup.html(data);
      var items = popup.find('.tls-cart--item');
      if (items.length) {
        badge.html(items.length).addClass('active');
      } else {
        badge.removeClass('active');
      }
    },

    addDeliveryHtml: function () {
      var elem = $(tlsHeaderElSelector);
      if (elem) {
        elem.html(
          '<div class="tls-delivery">' +
          '  <div class="tls-count-hours">\n' +
          '    <div class="tls-counter-title">' + this.snippets.timeBeforeText + '</div>\n' +
          '    <div class="tls-count-hours_block tls-js-hours"></div>\n' +
          '  </div>\n' +
          '  <div class="tls-count-hours tls-del">\n' +
          '    <div class="tls-counter-title">' + this.snippets.fastestDeliveryText + '</div>\n' +
          '    <div class="tls-box">\n' +
          '      <span class="tls-box_text tls-js-text"></span>\n' +
          '      <div class="tls-box_info">\n' +
          '        <a href="javascript:void(0);" class="tls-box_info-link">' + this.snippets.learnMoreLink + ' <i class="arrow down"></i></a>\n' +
          '        <div class="tls-js-popup"></div>' +
          '      </div>\n' +
          '    </div>\n' +
          '  </div>\n' +
          '</div>'
        );
      }
    },

    getCountriesHtml: function (countries) {
      var countriesHtml = '';
      countries.forEach(function (item) {
        if (item.delivery.minDate.dateAsText) {
          countriesHtml += '' +
            '<div class="tls-country">' +
            ' <div class="tls-left"><img src="' + (item.id ? item.icon : this.getEuropeIcon()) + '" alt="" /></div>' +
            ' <div class="tls-right">' +
            '   <span class="tls-title">' + item.delivery.minDate.dateAsText + '</span>' +
            '   <span class="tls-title2">' + item.delivery.minDate.name + '</span>' +
            ' </div>' +
            '</div>';
        }
      }.bind(this));
      return countriesHtml + '<a href="javascript:void(0);" class="tls-del-calc">' + this.snippets.deliveryCalcLink + '</a>';
    },

    getEuropeIcon: function () {
      return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAhCAIAAAAUH2/TAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wQJCCswija2uwAAA6dJREFUWMPtWE1sVFUUPufeO29myjD2x+k4YzpgaZoC/gSLhAgoBqkGYowLChSMxvjDogm60MTgwoULokQ0BE3dsFAWrYbEBaEgkUDCT1ogGmtxaAu0lFempUyddjpv3rx3j4uZTlig3Hl5RSSexd3c884995zvnu+ch9DYBveeMLgn5X53SzAJhG5Z4xB9yeGnxAAJAICwpir5xqrTnFHW5umsd0YBAe9ytEzvttXHwNQAAJBupuZuW3Gi/a02yomCgmTP1l8Em9+9aHm4bHn69Devfdc9GBu4EQLAnGQkuWFp+7uXAgBDan7q3M4NB1KGr3+02pIlOyccXCVnMy+3x/4M+L0mzeDpqxOr5PFnGJIklJKduVT76PxrGpMZwwfcnuUkUkH/p96FkXfa+kYeKu5IwuIKhOW+DG7e16NHi/ibNbcs8frKk5DzAMBQsgKCqd9GIn9jVf6qR0EzuwdjwCQQrln0R0k4U8YWsY/WHdr+/NG+RGRgvArU35jNNzWe37Xhe9sWvXokp4Yz5WihvDpRHqqYnLQElZQRbh+ON9RGR8u85nTW53YSCc9cmR98e++15AMlwhF9wix78+vuoZoCzlSC8N+male4BYHcdAsBW5871rS4VxO2M4c0bocCU1uXd/nUahhTAceS2NDO5gOfbvyhwj/tLGbVwcmD7+7Z3dLxeGwY5J0PVajySCnD+963LR6PlZwuU4ftrTJ8PTw8VnkqXt/VVwci5x7kLQFIDmikeA7kBACgsFSupcyJwsobJ2duUcECuVy3ACHrfWXJL5Dxl87t2soFl8DwqeNSlXw0bn+2sf2DFztH0oHf9Sipkw/h9qajnzd3oLAujoUz+RbNrWiZlrg8HroxHUhbmizxMXacbWQeGatKjk+oMkQJ/daRnkV7OpvmhRNFENOdUJ5XKNPMh1u/XNFwAZh0mxOR4okwaObgzUoAgIx/y7IuMLz/8HKXxq7mu6CB0RBo2ZP9depuldI048xq8w/XHdr76v7+kWhPIpzfEFxKyQo6hO+v/fnjl38UhPGxasMW+YvN8ojB7Yxk5/UaLZAmQpDsiajeuvr42oUXaivH8yqd8fqGmO7xZSfSc5yMd87KUPu5J784/MKCiJ4PQ2IqsGP9wQfnTtbt+GSmmbH41n2PPXJZPXEuzIlThh+4nUzPAQRAmDL811PBs0PzjvQstiQDJH2iHIQ1mgo6Iyv3+i3JgBC4dEwELiTxtmPF/79G/iX5C4XLbUjYbHn6AAAAAElFTkSuQmCC';
    },

    getCartHtml: function (countries) {
      return '<div class="tls-menu">\n' +
        '  <div class="tls-account">\n' +
        '    <div class="tls-icon"></div>\n' +
        '    <div class="tls-title">' + this.snippets.injectMenuAccountBtn + '</div>\n' +
        '    <div class="tls-js-popup"></div>\n' +
        '  </div>\n' +
        '  <div class="tls-fav">\n' +
        '    <div class="tls-icon"></div>\n' +
        '    <div class="tls-title">' + this.snippets.injectMenuFavBtn + '</div>\n' +
        '  </div>\n' +
        '  <div class="tls-cart">\n' +
        '    <div class="tls-icon"></div>\n' +
        '    <div class="tls-badge tls-badge-cart">0</div>\n' +
        '    <div class="tls-title">' + this.snippets.injectMenuCartBtn + '</div>\n' +
        '    <div class="tls-js-popup">\n' +
        '      <div class="tls-close"></div>' +
        '      <div class="tls-title">' + this.snippets.injectMenuCartBtn + '</div>' +
        '      <div class="tls-ajax"></div>' +
        '      <div class="tls-buttons">\n' +
        '        <a href="javascript:void(0);" class="tls-btn tls-checkout-btn">' + this.snippets.checkoutButton + '</a>\n' +
        '        <a href="javascript:void(0);" class="tls-btn tls-cart-btn">' + this.snippets.cartButton2 + '</a>\n' +
        '      </div>\n' +
        '    </div>\n' +
        '  </div>\n' +
        '</div>\n';
    },

    goTo: function (view) {
      var mainFrame = document.getElementById('tlsMainFrame');
      if (view !== 'deliveryCalc' && mainFrame) {
        mainFrame.contentWindow.postMessage({type: 'navigate', pageView: view}, '*');
      } else if (view === 'deliveryCalc' && window.tlsConfiguratorUrl) {
        window.open(window.tlsConfiguratorUrl + '?view=' + view, '_blank');
      } else if (window.tlsConfiguratorUrl) {
        window.location.href = window.tlsConfiguratorUrl + '?view=' + view;
      }
    },

    isMobile: function () {
      try {
        document.createEvent("TouchEvent");
        return true;
      }
      catch (e) {
        return false;
      }
    }
  };
}
