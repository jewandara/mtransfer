(function($, undefined) {

  $.fn.monthpicker = function(options) {

    var months = options.months || ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],

      Monthpicker = function(el) {
        this._el = $(el);
        this._init();
        this._render(el.id);
        this._renderYears();
        this._renderMonths();
        this._bind();
      };

    Monthpicker.prototype = {
      destroy: function() {
        this._el.off('click');
        this._yearsSelect.off('click');
        this._container.off('click');
        $(document).off('click', $.proxy(this._hide, this));
        this._container.remove();
      },

      _init: function() {
        this._el.html(months[0] + ' ' + options.years[0]);
        this._el.data('monthpicker', this);
      },

      _bind: function() {
        this._el.on('click', $.proxy(this._show, this));
        $(document).on('click', $.proxy(this._hide, this));
        this._yearsSelect.on('click', function(e) { e.stopPropagation(); });
        this._container.on('click', 'button', $.proxy(this._selectMonth, this));
      },

      _show: function(e) {
        e.preventDefault();
        e.stopPropagation();
        this._container.css('display', 'inline-block');
      },

      _hide: function() {
        this._container.css('display', 'none');
      },

      _selectMonth: function(e) {
        var monthIndex = $(e.target).data('value'),
          month = months[monthIndex],
          year = this._yearsSelect.val();
          //this._el.html(month + ' ' + year);
        if (options.onMonthSelect) {
          options.onMonthSelect(monthIndex, month, year);
        }
      },

      _render: function(id) {
        if(screen.width > 425 || window.innerWidth > 425){
          var linkPosition = this._el.position(),
            cssOptions = {
              display:  'none',
              position: 'absolute',
              bottom: '-310px',
              left: linkPosition.left
            };
        }
        else{
          var linkPosition = this._el.position(),
            cssOptions = {
              display:  'none',
              width: '100%',
              position: 'fixed',
              bottom: '0px',
              left: linkPosition.left
            };
        }

        this._id = (new Date).valueOf();
        this._container = $('<div class="monthpicker" id="monthpicker-' + this._id +'">')
          .css(cssOptions)
          .appendTo($('.mpicker'));
      },

      _renderYears: function() {
        var markup = $.map(options.years, function(year) {
          return '<option>' + year + '</option>';
        });
        var yearsWrap     = $('<div class="years">').appendTo(this._container);
        this._yearsSelect = $('<select>').html(markup.join('')).appendTo(yearsWrap);
      },

      _renderMonths: function() {
        var markup = ['<table>', '<tr>'];
        $.each(months, function(i, month) {
          if (i > 0 && i % 4 === 0) {
            markup.push('</tr>');
            markup.push('<tr>');
          }
          markup.push('<td><button data-value="' + i + '">' + month +'</button></td>');
        });
        markup.push('</tr>');
        markup.push('</table>');
        this._container.append(markup.join(''));
      }
    };

    var methods = {
      destroy: function() {
        var monthpicker = this.data('monthpicker');
        if (monthpicker) monthpicker.destroy();
        return this;
      }
    }

    if ( methods[options] ) {
        return methods[ options ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof options === 'object' || ! options ) {
      return this.each(function() {
        return new Monthpicker(this);
      });
    } else {
      $.error( 'Method ' +  options + ' does not exist on monthpicker' );
    }

  };

}(jQuery));
