<div style="padding: 4px 8px; text-align: left;">

    <div class="section">
        <h2 style="width: 10%">{{ __('Rules') }}</h2>
        <p>{!! nl2br(e($rentPointConditions->rules)) !!}</p>
    </div>

    <div class="section">
        <h2 style="width: 10%">{{ __('Prohibitions') }}</h2>
        <p>{!! nl2br(e($rentPointConditions->prohibitions)) !!}</p>
    </div>

    <div class="section">
        <h2 style="width: 10%">{{ __('Responsibilities') }}</h2>
        <p>{!! nl2br(e($rentPointConditions->responsibilities)) !!}</p>
    </div>

    <style>
        .section {
            display: flex;
            flex-wrap: wrap; /* Обертывание на новую строку, если не помещается на одной */
            justify-content: space-between;
            align-items: flex-start; /* Выравнивание элементов по верхнему краю */
            margin-bottom: 8px;
        }

        .section h2 {
            margin: 0;
        }

        .section p {
            margin: 0 0 8px;
            width: 70%; /* Оставшееся пространство для текста */
        }
    </style>
</div>
