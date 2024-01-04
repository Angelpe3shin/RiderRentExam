<div style="padding: 4px 8px; text-align: left;">

    <div class="section">
        <h2 style="width: 10%">{{ __('Payment Details') }}</h2>
        <p>{!! nl2br(e($details)) !!}</p>
    </div>

    <style>
        .section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }

        .section h2 {
            margin: 0;
        }

        .section p {
            margin: 0 0 8px;
            width: 90%;
        }
    </style>
</div>