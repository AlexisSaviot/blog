$(document).ready(function(){
    $('#commentSubmit').click(function(e) {
        e.preventDefault();
        let pseudo = $('#pseudo').val();
        let content = $('#content').val();
        let id = $('#articleId').val();
        
        $.post(
            'comments.php',
            {
                pseudo: pseudo,
                content: content,
                id: id
            },
            function(data){
                console.log("coucou");
                console.log(data);
                console.log("coucou2");
                let badgeValue = parseInt($('#badge').html());
                newBadgeValue = badgeValue += 1;
                $('#badge').html(newBadgeValue);
                $('#comments').html(data);
            }
        )
        // $('#pseudo').val('');
        // $('#comment').val('');
    })
})