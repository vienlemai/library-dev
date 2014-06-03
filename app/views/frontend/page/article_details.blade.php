@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-bullhorn'></i>
    Tin tức / Thông báo
</div>
<div class="clear"></div>
<div class="section-content articles">
    <h3><?php echo $article->title ?></h3>
    <span class="timestamp text-muted"><?php echo date('m/d/Y - H:i', strtotime($article->created_at)) ?></span>
    <div class="">
        <?php echo $article->content ?>
    </div>

</div>

@stop
