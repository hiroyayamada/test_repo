@extends('layout')
@section('title', '顧客管理システム')

@section('content')
<?php 
    $a = true;
    $b = true;    
?>
<div class="container-fluid">
    <div style="margin: 30px">
        <h2>Information</h2>
        @if ($a)
            <div>
                <span>未確認の案件があります</span>
            </div> 
        @endif
        @if ($b)
            <div>
                <span>調査会社に振り分けていない案件があります</span>
            </div>
        @endif
        @if (!$a && !$b)
            <div>
                <span>通知はありません</span>
            </div>
        @endif
        <div>

        </div>
    </div>
</div>
@endsection