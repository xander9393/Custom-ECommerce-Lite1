<!-- fontawesome -->
<script src="https://kit.fontawesome.com/c4359b8e83.js" crossorigin="anonymous"></script>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- CKeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script src="./assets/js/ckeditor.js"></script>

<script type="text/javascript">
    $('.carousel-btn').click(function() {
        $('.carousel-show').toggleClass("show");
        $('.first').toggleClass("rotate");
    });
    $('.info-btn').click(function() {
        $('.info-show').toggleClass("show1");
        $('.second').toggleClass("rotate");
    });
    $('.head-btn').click(function() {
        $('.head-show').toggleClass("show2");
        $('.third').toggleClass("rotate");
    });
    // $('.text ul li').click(function() {
    //     $(this).addClass("active").siblings().removeClass('active')
    // });
</script>

<!-- 
<script>
    $(document).ready(function() {
        var charToReplace = ['_'];
        $('.test').html(function(i, v) {
            var resultStr = '';
            for (var i = 0; i < v.length; i++) {
                var ch = v.charAt(i);

                if ($.inArray(ch, charToReplace) >= 0) {
                    resultStr += '<span class="hideMe">' + ch + '</span>';
                } else {
                    resultStr += ch;
                }
            }

            return resultStr;
        }).find('.hideMe').show(function() {
            $(this).css('opacity', 0).show();
        });
    });
</script> -->