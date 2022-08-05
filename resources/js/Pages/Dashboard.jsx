import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import {Box} from "@primer/react";
import {LineSeries, VerticalBarSeries, XYPlot} from "react-vis";

const data = [
    {x: 0, y: 8},
    {x: 1, y: 5},
    {x: 2, y: 4},
    {x: 3, y: 9},
    {x: 4, y: 1},
    {x: 5, y: 7},
    {x: 6, y: 6},
    {x: 7, y: 3},
    {x: 8, y: 2},
    {x: 9, y: 0}
];

export default function Dashboard(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard"><title>Dashboard</title></Head>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">You're logged in!</div>
                    </div>
                </div>
            </div>

            <Box display="flex">
                <Box flex={1}>
                    <XYPlot height={600} width={600}>
                        <VerticalBarSeries data={data} />
                    </XYPlot>
                </Box>
                <Box flex={1}>
                    <XYPlot height={200} width={200}>
                        <LineSeries data={data} />
                    </XYPlot>
                </Box>
            </Box>
        </Authenticated>
    );
}
