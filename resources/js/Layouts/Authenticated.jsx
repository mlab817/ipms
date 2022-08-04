import React, { useState } from 'react';
import {Box, Flash, PageLayout} from '@primer/react'
import PageHeader from "@/Components/PageHeader";
import PageFooter from "@/Components/PageFooter";
import {usePage} from "@inertiajs/inertia-react";

export default function Authenticated({ auth, children }) {
    const { flash } = usePage().props

    return (
        <PageLayout padding="none">
            <PageLayout.Header>
                <PageHeader />
            </PageLayout.Header>
            <PageLayout.Content>
                {
                    flash.message && (
                        <Flash>{flash.message}</Flash>
                    )
                }
                <Box minHeight="100vh">
                    {children}
                </Box>
            </PageLayout.Content>
            <PageLayout.Footer>
                <PageFooter />
            </PageLayout.Footer>
        </PageLayout>
    );
}
