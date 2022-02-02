$(function () {
    $('.calendar').each(function () {
        $(this).on('click', function () {
            $(this).closest('.datepicker').click();
        })
    })

});
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
$(document).ready(function () {
    
    $('.button-left').click(function () {
        $('.sidebar').toggleClass('fliph');
    });

    $('.more-opt').on('click', function () {
        $(this).each(function () {
            $(this).siblings('ul').show()
        })
    })

    $('.cst-slct ul li').on('click', function () {
        $(this).each(function () {
            $(this).parent('ul').hide()
        })
    })

    
    $('.pdf-down').on('click', function () {
        $(this).each(function () {
            alert('File has been downloaded!');
        })
    })

});

function closeAllModals() {

    // get modals
    const modals = document.getElementsByClassName('modal');

    // on every modal change state like in hidden modal
    for(let i=0; i<modals.length; i++) {
        modals[i].classList.remove('show');
        modals[i].setAttribute('aria-hidden', 'true');
        modals[i].setAttribute('style', 'display: none');
    }

    // get modal backdrops

    // remove every modal backdrop
    for(let i=0; i<modalsBackdrops.length; i++) {
        document.body.removeChild(modalsBackdrops[i]);
    }
}

$(document.body).on('click', '.sub-menu' ,function(){
    if ($(this).hasClass('active_')) {
        $(this).children().children('ul').slideUp();
        $(this).removeClass('active_');
        $(this).children().find('.arrow').attr('src', '/img/menu-icons/arrow-down.png')
    } else {
        $(this).children().children('ul').slideDown();
        $(this).addClass('active_');
        $(this).children().find('.arrow').attr('src', '/img/menu-icons/arrow-up.png')
    }
})
$(document.body).on('click', '.cancel-popup' ,function(){
    $('.cstm-modal').removeClass('show');
    $('body').removeClass('modal-open');
    $('.modal').attr("aria-hidden","true").removeAttr("aria-modal","true").removeAttr("role", "dialog").css('display', 'none');
    $('.modal-backdrop').remove();
})

$(document.body).on('click', '#signInOpt' ,function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active');
        $('.signInOpt').hide();
    }
    else {
        $(this).addClass('active');
        $('.signInOpt').show();
    }
})
$(document.body).on('click', '.signInOpt li' ,function(){
    $('.signInOpt').hide();
    var li_value = $(this).text();
    $('#signInOpt').removeClass('active').text(li_value);

})
$(document.body).on('mouseup', function(e)
{
    var container = $('.signInOpt');

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        container.hide();
        $('#signInOpt').removeClass('active');
    }
});

$(document.body).on('click', '.eye-icon-pass i', function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active');
        $(this).siblings('input').attr('type', 'password');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
    }
    else {
        $(this).addClass('active');
        $(this).siblings('input').attr('type', 'text');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
    }
})



$(document.body).on('click', 'table', function(){
    if ($(window).width() < 960) {
        var tableId = $(this).attr('id');
        
        var headT = $('table#'+tableId+' thead th');
        headT.on('click', function(){
            return false;
        })
        var tableHeads = [];
        var x = $('table#'+tableId+' thead tr th').each(function(){
            var data = $(this).contents();
            return data;
        });     
        var length_col = x.length;
        for(var i=0;i<=length_col-1;i++){
            var push_Arr = $(x[i]).text();
            tableHeads.push(push_Arr);
            var intNth = parseInt(i+1);
            var dyn_nth = "nth-child("+intNth+")";
            $('table#'+tableId+' tbody tr.set-table td:'+dyn_nth).prepend("<span class='title-span'>"+$(x[i]).text()+"</span>");
            console.log($(x[i]).text())
            // .mob-expand
        }     
    }
});

$(document.body).on('click', 'tbody tr', function(){
    if ($(window).width() < 960) {
        $("table.table.recent-Orders-table tr .title-span").remove();
        $("table.table.recent-Orders-table tr").removeClass("set-table");
        $(this).addClass("set-table");
    }
});