<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-PosAja Report</title>

    <style>
        body {
            font-size: 12px;
            margin: 0px;
        }

        .table-border {
            border: 1.5px solid #292929;
        }

        .table-text-center {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .column-6 {
            flex: 1;
            padding: 7px;
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-header {
            margin-top: -13px;
        }

        .text-first-header {
            margin-top: 0px;
        }

        .header-bottom {
            margin-bottom: -7px;
            padding-bottom: 0px;
        }

        .kode-row {
            width: fit-content;
        }

        .table-patroli {
            height: 30px;
        }

        .table-sign {
            height: 75px;
        }

        .date-footer {
            margin-top: -32px;
        }

        .footer-note {
            margin-top: -10px;
        }

        .footer-name {
            margin-top: 25px;
            margin-bottom: -20px;
        }

        .footer {
            display: flex;
            flex-wrap: wrap;
        }

        .note-1 {
            position: fixed;
            left: 69.7% !important;
        }

        .footer-head-1 {
            position: fixed;
            margin-top: -18px;
            left: 68% !important;
        }

        .note-2 {
            position: fixed;
            left: 79.7% !important;
        }

        .footer-head-2 {
            position: fixed;
            margin-top: -18px;
            left: 78% !important;
        }

        .title {
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .uppercase {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <h2 class="title">
        Data Responden
    </h2>
    <table class="table-border">
        <thead>
            <tr class="table-border table-text-center">
                <th class="table-border">
                    NO</th>
                <th class="table-border">
                    Nama</th>
                @foreach ($questions as $index => $question)
                    <th class="table-border">
                        P{{ $index + 1 }}
                    </th>
                @endforeach
                <th class="table-border">
                    Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $num = 1;
            @endphp
            @foreach ($data as $respondentCode => $respondents)
                @php
                    $respondent = $respondents->first(); // Get any respondent from the group for the name and code
                    $total = 0;
                @endphp
                <tr class="table-border table-text-center">
                    <td class="table-border">
                        <span>{{ $num++ }}</span>
                    </td>
                    <td class="table-border text-left">
                        <span>{{ $respondent->name }}</span>
                    </td>
                    @foreach ($questions as $index => $question)
                        @php
                            $score = $respondents->firstWhere('question_id', $question->id)->score->value ?? 0;
                            $total += $score;
                        @endphp
                        <td class="table-border">{{ $score }}</td>
                    @endforeach
                    <td class="table-border">{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="title mt-20">
        Data Skor Pertanyaan
    </h2>
    <table class="table-border">
        <thead>
            <tr class="table-border table-text-center">
                <th class="table-border">
                    NO</th>
                <th class="table-border">
                    Pertanyaan</th>
                @foreach ($scores as $score)
                    <th class="table-border uppercase">
                        {{ $score }}
                    </th>
                @endforeach
                <th class="table-border">
                    Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $num = 1;
            @endphp
            @foreach ($questionsData as $questionData)
                <tr class="table-border table-text-center">
                    <td class="table-border">
                        <span>{{ $num++ }}</span>
                    </td>
                    <td class="table-border text-left">
                        <span>{{ $questionData['question'] }}</span>
                    </td>
                    @foreach ($scores as $score)
                        <td class="table-border">{{ $questionData[$score] ?? 0 }}</td>
                    @endforeach
                    <td class="table-border">{{ $questionData['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
