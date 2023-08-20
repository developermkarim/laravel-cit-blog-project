@extends('frontend.home_dashboard')
@section('home')

<style>
    /* Poll Page */
.poll-item {
	padding: 20px;
	background: #ececec;
	margin-bottom: 30px;
}
.poll-item .question {
	font-size: 22px;
	font-weight: 700;
	border-bottom: 1px solid #807f7f;
	margin-bottom: 15px;
}
.poll-item .poll-result {
	margin-top: 15px;
}
.poll-item .poll-result table,
.poll-item .poll-result table td {
	border-color: #8b8b8b;
	background: #fff;
}
.poll-item .poll-result table tr:nth-of-type(1) td {
	width: 200px;
}

</style>
@section('title','24-News')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ "PREVIOUS_POLLS" }}</h2>
            <nav class="breadcrumb-container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ "PREVIOUS_POLLS" }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        @foreach ($allVotes as $vote)
            @if ($loop->iteration==1)
                @continue
            @endif

            @php
            $total_votes = $vote->yes + $vote->no + $vote->no_opinion;
                if ($vote->yes == '0') {
                    $total_yes_vote_percentage = 0;
                }else {
                    $total_yes_vote_percentage = ($vote->yes*100)/$total_votes;
                    $total_yes_vote_percentage = ceil($total_yes_vote_percentage);
                }
                if ($vote->no == '0') {
                   $total_no_vote_percentage = 0;

                }else {

                    $total_no_vote_percentage = ($total_no_vote_percentage*100)/$total_votes;
                    $total_no_vote_percentage = ceil($total_no_vote_percentage);
                }
                if ($vote->no_opinion == '0') {
                    $total_no_opinion_vote_percentage = 0;
                } else {
                    $total_no_opinion_vote_percentage = ($total_no_vote_percentage*100)/$total_votes;
                    $total_no_opinion_vote_percentage = ceil($total_no_vote_percentage);
                }
                
            @endphp
                           <div class="poll-item">
                            <div class="question">
                                {!! $vote->title !!}
                            </div>
                            <div class="poll-date">
                                @php
                                $ts = strtotime($vote->created_at);
                                $updated_date = date('d F, Y',$ts);
                                @endphp
                                <b>{{ "POLL_DATE" }}</b> {{ $updated_date }}
                            </div>
                            <div class="total-vote">
                                <b>{{ "TOTAL_VOTES" }}</b> {{ $total_votes }}
                            </div>
                            <div class="poll-result">                        
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>{{ "YES" }} ({{ $vote->yes }})</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $total_yes_vote_percentage }}%" aria-valuenow="{{ $total_yes_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_yes_vote_percentage }}%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ "NO" }} ({{ $vote->no }})</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_no_vote_percentage }}%" aria-valuenow="{{ $total_no_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_no_vote_percentage }}%</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ "NO OPINION" }} ({{ $vote->no_opinion }})</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_no_opinion_vote_percentage }}%" aria-valuenow="{{ $total_no_opinion_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_no_opinion_vote_percentage }}%</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
        @endforeach
        </div>

    </div>
</div>

@endsection;