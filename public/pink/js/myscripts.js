jQuery(document).ready(function ($) {

    $('.commentlist li').each(function (i) {

       $(this).find('div.commentNumber').text('#' + (i + 1));

    });

    $('#commentform').on('click', '#submit', function (e) {

        e.preventDefault();

        var comParent = $(this);

        $('.wrap_result').css('color', 'green').text('Сохранение комментария').fadeIn(500, function () {

            var data = $('#commentform').serializeArray();

            $.ajax({

                url:$('#commentform').attr('action'),
                data:data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                datatype:'JSON',
                success: function (html) {
                    if (html.error) {
                        $('.wrap_result').css('color', 'red').append('<br/><strong>Ошибка: </strong><br/>' + html.error.join('<br/>') );
                        $('.wrap_result').delay(3000).fadeOut(500);

                    }
                    else if (html.success) {

                        $('.wrap_result').fadeOut(500, function () {

                            if (html.data.parent_id > 0 ) {

                                comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');

                                $('#cancel-comment-reply-link').click();
                            }
                            else {

                                if ( $("div:contains('ol.commentlist')") ) {
                                    $('ol.commentlist').append(html.comment);
                                }
                            //======НЕ РАБОТАЕТ ЭТА ЧАСТЬ======
                                else {
                                    alert('nit');
                                    $('div#comments').append('<ol class="commentlist group">' + html.comment + '</ol>');
                                }
                            //======НЕ РАБОТАЕТ ЭТА ЧАСТЬ======

                            }



                        })
                    }

                },
                error: function () {
                    $('.wrap_result').css('color', 'red').append('<br/><strong>Ошибка! </strong><br/>');
                    $('.wrap_result').delay(3000).fadeOut(500, function () {
                        $('#cancel-comment-reply-link').click();
                    })
                }

            });

        });



    });



    $('#contact-form-contact-us').on('click', '#sendmail', function (e) {

        e.preventDefault();

        $('.wrap_result').css('height', '20px');
        $('.wrap_result').css('color', 'green').text('Отправка формы').fadeIn(500, function () {

            var data = $('#contact-form-contact-us').serializeArray();

            $.ajax({
                url: $('#contact-form-contact-us').attr('action'),
                data: data,
                type: 'post',
                dataType: 'json',
                success: function (html) {
                    if (html.error) {
                        $('.wrap_result').css('height', '90px');
                        $('.wrap_result').css('color', 'red').append('<br> Ошибка: <br>' + html.error.join('<br>'));
                        $('.wrap_result').delay(3000).fadeOut(500);
                    }
                    else if(html.success) {
                        $('.wrap_result').text('Форма успешно отправлена');
                        $('.wrap_result').delay(1000).fadeOut(500);
                    }
                }
            });
        });


    });


});
