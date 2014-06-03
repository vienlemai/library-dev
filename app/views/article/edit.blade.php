@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Chỉnh sửa thông báo
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href='{{route('readers')}}'>
                        <i class='i-reply'></i>
                        Danh sách thông báo
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Nhập thông báo</h2>
                </div>
                <div class='content'>        
                    <div class="span10">
                        @include('partials.flash')    
                        {{ Former::horizontal_open(route('article.update',$article->id))->method('POST') }}
                        {{Former::xxlarge_text('title')
								->label('Tiêu đề (*)')
                                ->value($article->title)
                        }}
                        {{Former::textarea('content')
                        ->label('Nội dung')
                        ->value($article->content)
                        ->id('article-content')
                        ->class('input-large editor')
                        ->rows(20)
                        }}	

                        {{Former::actions()
                        ->primary_submit('Lưu')
                        ->inverse_reset('Nhập lại')
                        }}

                        {{Former::close()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
