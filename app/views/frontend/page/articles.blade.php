@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-bullhorn'></i>
    Thông báo
</div>
<div class="clear"></div>
<div class="section-content articles">
    <?php foreach ($articles as $article) : ?>
        <div class="article">
            <div class="article-title">
                <h4><a href="<?php echo route('fe.article_details', $article->id) ?>"><?php echo $article->title ?></a></h4>
                <span class="timestamp text-muted"><?php echo date('m/d/Y - H:i', strtotime($article->created_at)) ?></span>
            </div>
            <div class="article-content">
                <?php echo truncate(strip_tags($article->content), 400) ?>
            </div>
            <a href="<?php echo route('fe.article_details', $article->id) ?>" class="read-more">>> Đọc thêm</a>
        </div>
    <?php endforeach; ?>
</div>
<div class='pagination'>
    {{$articles->links()}}
</div>
@stop
