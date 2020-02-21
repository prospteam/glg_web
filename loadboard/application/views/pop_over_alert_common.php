
<script type="text/javascript">
    $(document).ready(function(){
      $('.page-title').after('<div class="alert alert-info alert-dismissible fade in" role="alert">\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>\
                    </button><?= $content ?></div>');
    });
</script>
