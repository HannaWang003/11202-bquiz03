<input type="button" value="新增電影" class="btn">
<hr>
<script>
    movieAry('Movie');
    $('.btn').on('click',function(){
        $.ajax({
            type:'get',
            url:'./back/add_movie.php',
            success:function(res){
                $('.tab').load('./back/add_movie.php');
            }
        })
    })
    function movieAry(table){
        $.ajax({
            type:'get',
            url:'./api/getAll.php',
            data:{
                table
            },
            dataType:'json',
            success:function(res){
                console.log(res);
            }
        })

    }
</script>