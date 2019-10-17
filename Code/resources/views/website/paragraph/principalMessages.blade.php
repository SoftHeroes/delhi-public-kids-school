@if ( isset($PMTitle) && isset($PMSubTitle) && isset($PMCreatedDate) )
<!-- Paragraph block -->
<div class="principalMessages">
    <div class="title">{{$PMTitle}}</div>
    <hr>
    <div class="subText">{!! nl2br(e($PMSubTitle)) !!}</div>
    <hr>
    <p class="postDate text-right"><i>posted on : {{$PMCreatedDate}}</i></p>
</div>
<!-- Paragraph block -->
@endif
