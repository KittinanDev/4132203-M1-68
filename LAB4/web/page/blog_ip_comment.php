<div>
    <form id="fm_blog">
        <input type="text" name="blog">
        <button type="submit">Save</button>
    </form>
</div>

<script>
    $('#fm_blog').submit(function(e){

        e.preventDefault();

        $.ajax({
            url: '/php/blog.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function($response){
                alert($response.message);
                $("#tb_blog").load("/page/blog_tb_comment.php");
                
            },
        
        });
    });
</script>