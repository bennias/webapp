require('./bootstrap');

var postId = 0;
var postBodyCache = null;

$('.posts').on('click', '.post .interaction .edit', function(event) {
    postBodyCache = $(this).closest('.post').find('p:eq(0)');
    var postBody = postBodyCache.text();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function () {
   $.ajax({
      method: 'POST',
      url: url,
      data: {body: $('#post-body').val(), postId: postId, _token: token}
   })
   .done(function (msg) {
       /*console.log(JSON.stringify(msg));*/
       $(postBodyCache).text(msg['new_body']);
       $('#edit-modal').modal('hide');
   });
});



