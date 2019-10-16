@if ( isset($PMTitle) && isset($PMSubTitle) && isset($PMCreatedDate) )
<!-- Paragraph block -->
<div class="principalMessages">
    <div class="title">{{$PMTitle}}</div>
    <div class="subText">{!! nl2br(e($PMSubTitle)) !!}</div>
    <p class="postDate text-right"><i>posted on : {{$PMCreatedDate}}</i></p>
</div>
<!-- Paragraph block -->
@endif
