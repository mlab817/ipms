import React from "react";
import {Box, Header, Text} from "@primer/react";
import { Link } from '@inertiajs/inertia-react'

const PageFooter = () => {
    return (
        <Box display="flex" flexDirection="column" py={3} border={0} borderTopWidth={1} borderBottomWidth={1} borderStyle="solid" borderColor="border.default">
            <Box display="flex">
                <Box flexGrow={1}>
                    <Text>&copy; 2022 Investment Programming Division</Text>
                </Box>
                <Box display="flex" justifyContent="space-between" flex={0.2}>
                    <Box>
                        <Link href={route('dashboard')}>Dashboard</Link>
                    </Box>
                    <Box ml={2}>
                        <Link href={route('projects.index')}>Projects</Link>
                    </Box>
                    <Box ml={2}>
                        <Link href={route('projects.index')}>Tracker</Link>
                    </Box>
                    <Box ml={2}>
                        <Link href={route('directory')}>Reports</Link>
                    </Box>
                    <Box ml={2}>
                        <Link href={route('directory')}>Directory</Link>
                    </Box>
                    <Box ml={2}>
                        <Link href={route('about')}>About</Link>
                    </Box>
                </Box>
            </Box>
        </Box>
    )
}

export default PageFooter