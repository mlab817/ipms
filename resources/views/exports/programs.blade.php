<table style="border: 1px solid black; border-collapse: collapse; ">
    <caption>Investment Requirements</caption>
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Program</th>
            <th rowspan="2">Subprogram</th>
            <th rowspan="2">Activity</th>
            <th rowspan="2">UACS Code</th>
            <th colspan="11" class="text-center">Infrastructure Investments (PhP)</th>
            <th colspan="11" class="text-center">Total Investments (PhP)</th>
            <th colspan="11" class="text-center">National Expenditure Program (PhP)</th>
            <th colspan="11" class="text-center">General Appropriations Act (PhP)</th>
            <th colspan="11" class="text-center">Actual Disbursements (PhP)</th>
        </tr>
        <tr>
            <th>2016 &amp; Prior</th>
            <th>2017</th>
            <th>2018</th>
            <th>2019</th>
            <th>2020</th>
            <th>2021</th>
            <th>2022</th>
            <th>2023</th>
            <th>2024</th>
            <th>2025 &amp; Beyond</th>
            <th>Total</th>
            <th>2016 &amp; Prior</th>
            <th>2017</th>
            <th>2018</th>
            <th>2019</th>
            <th>2020</th>
            <th>2021</th>
            <th>2022</th>
            <th>2023</th>
            <th>2024</th>
            <th>2025 &amp; Beyond</th>
            <th>Total</th>
            <th>2016 &amp; Prior</th>
            <th>2017</th>
            <th>2018</th>
            <th>2019</th>
            <th>2020</th>
            <th>2021</th>
            <th>2022</th>
            <th>2023</th>
            <th>2024</th>
            <th>2025 &amp; Beyond</th>
            <th>Total</th>
            <th>2016 &amp; Prior</th>
            <th>2017</th>
            <th>2018</th>
            <th>2019</th>
            <th>2020</th>
            <th>2021</th>
            <th>2022</th>
            <th>2023</th>
            <th>2024</th>
            <th>2025 &amp; Beyond</th>
            <th>Total</th>
            <th>2016 &amp; Prior</th>
            <th>2017</th>
            <th>2018</th>
            <th>2019</th>
            <th>2020</th>
            <th>2021</th>
            <th>2022</th>
            <th>2023</th>
            <th>2024</th>
            <th>2025 &amp; Beyond</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    @foreach($prexc_activities as $pa)
        <tr>
            <td>{{ $pa->id }}</td>
            <td>{{ $pa->prexc_program ? $pa->prexc_program->name : null }}</td>
            <td>{{ $pa->prexc_subprogram ? $pa->prexc_subprogram->name : null }}</td>
            <td>{{ $pa->name ? $pa->name : null }}</td>
            <td>{{ $pa->uacs_code ? $pa->uacs_code : null }}</td>
            <td>{{ $pa->infrastructure_target_2016 }}</td>
            <td>{{ $pa->infrastructure_target_2017 }}</td>
            <td>{{ $pa->infrastructure_target_2018 }}</td>
            <td>{{ $pa->infrastructure_target_2019 }}</td>
            <td>{{ $pa->infrastructure_target_2020 }}</td>
            <td>{{ $pa->infrastructure_target_2021 }}</td>
            <td>{{ $pa->infrastructure_target_2022 }}</td>
            <td>{{ $pa->infrastructure_target_2023 }}</td>
            <td>{{ $pa->infrastructure_target_2024 }}</td>
            <td>{{ $pa->infrastructure_target_2025 }}</td>
            <td>{{ $pa->infrastructure_target_total }}</td>
            <td>{{ $pa->investment_target_2016 }}</td>
            <td>{{ $pa->investment_target_2017 }}</td>
            <td>{{ $pa->investment_target_2018 }}</td>
            <td>{{ $pa->investment_target_2019 }}</td>
            <td>{{ $pa->investment_target_2020 }}</td>
            <td>{{ $pa->investment_target_2021 }}</td>
            <td>{{ $pa->investment_target_2022 }}</td>
            <td>{{ $pa->investment_target_2023 }}</td>
            <td>{{ $pa->investment_target_2024 }}</td>
            <td>{{ $pa->investment_target_2025 }}</td>
            <td>{{ $pa->investment_target_total }}</td>
            <td>{{ $pa->gaa_2016 }}</td>
            <td>{{ $pa->gaa_2017 }}</td>
            <td>{{ $pa->gaa_2018 }}</td>
            <td>{{ $pa->gaa_2019 }}</td>
            <td>{{ $pa->gaa_2020 }}</td>
            <td>{{ $pa->gaa_2021 }}</td>
            <td>{{ $pa->gaa_2022 }}</td>
            <td>{{ $pa->gaa_2023 }}</td>
            <td>{{ $pa->gaa_2024 }}</td>
            <td>{{ $pa->gaa_2025 }}</td>
            <td>{{ $pa->gaa_total }}</td>
            <td>{{ $pa->nep_2016 }}</td>
            <td>{{ $pa->nep_2017 }}</td>
            <td>{{ $pa->nep_2018 }}</td>
            <td>{{ $pa->nep_2019 }}</td>
            <td>{{ $pa->nep_2020 }}</td>
            <td>{{ $pa->nep_2021 }}</td>
            <td>{{ $pa->nep_2022 }}</td>
            <td>{{ $pa->nep_2023 }}</td>
            <td>{{ $pa->nep_2024 }}</td>
            <td>{{ $pa->nep_2025 }}</td>
            <td>{{ $pa->nep_total }}</td>
            <td>{{ $pa->disbursement_2016 }}</td>
            <td>{{ $pa->disbursement_2017 }}</td>
            <td>{{ $pa->disbursement_2018 }}</td>
            <td>{{ $pa->disbursement_2019 }}</td>
            <td>{{ $pa->disbursement_2020 }}</td>
            <td>{{ $pa->disbursement_2021 }}</td>
            <td>{{ $pa->disbursement_2022 }}</td>
            <td>{{ $pa->disbursement_2023 }}</td>
            <td>{{ $pa->disbursement_2024 }}</td>
            <td>{{ $pa->disbursement_2025 }}</td>
            <td>{{ $pa->disbursement_total }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5">Total</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2016') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2017') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2018') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2019') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2020') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2021') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2022') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2023') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2024') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_2025') }}</th>
            <th>{{ $prexc_activities->sum('infrastructure_target_total') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2016') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2017') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2018') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2019') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2020') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2021') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2022') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2023') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2024') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_2025') }}</th>
            <th>{{ $prexc_activities->sum('investment_target_total') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2016') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2017') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2018') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2019') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2020') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2021') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2022') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2023') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2024') }}</th>
            <th>{{ $prexc_activities->sum('gaa_2025') }}</th>
            <th>{{ $prexc_activities->sum('gaa_total') }}</th>
            <th>{{ $prexc_activities->sum('nep_2016') }}</th>
            <th>{{ $prexc_activities->sum('nep_2017') }}</th>
            <th>{{ $prexc_activities->sum('nep_2018') }}</th>
            <th>{{ $prexc_activities->sum('nep_2019') }}</th>
            <th>{{ $prexc_activities->sum('nep_2020') }}</th>
            <th>{{ $prexc_activities->sum('nep_2021') }}</th>
            <th>{{ $prexc_activities->sum('nep_2022') }}</th>
            <th>{{ $prexc_activities->sum('nep_2023') }}</th>
            <th>{{ $prexc_activities->sum('nep_2024') }}</th>
            <th>{{ $prexc_activities->sum('nep_2025') }}</th>
            <th>{{ $prexc_activities->sum('nep_total') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2016') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2017') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2018') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2019') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2020') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2021') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2022') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2023') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2024') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_2025') }}</th>
            <th>{{ $prexc_activities->sum('disbursement_total') }}</th>
        </tr>
    </tfoot>
</table>
