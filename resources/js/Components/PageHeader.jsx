import React from "react";
import {Avatar, Header, StyledOcticon} from "@primer/react";
import {MarkGithubIcon} from "@primer/octicons-react";
import {usePage} from "@inertiajs/inertia-react";

const PageHeader = () => {
    const { appName } = usePage().props

    return (
        <Header>
            <Header.Item>
                <Header.Link href="#" fontSize={2}>
                    <StyledOcticon icon={MarkGithubIcon} size={32} sx={{mr: 2}} />
                    <span>{appName}</span>
                </Header.Link>
            </Header.Item>
            <Header.Item>
                <Header.Link href={route('dashboard')}>Dashboard</Header.Link>
            </Header.Item>
            <Header.Item>
                <Header.Link href={route('projects.index')}>Projects</Header.Link>
            </Header.Item>
            <Header.Item>
                <Header.Link href={route('offices.index')}>Offices</Header.Link>
            </Header.Item>
            <Header.Item>
                <Header.Link href={route('directory')}>Directory</Header.Link>
            </Header.Item>
            <Header.Item>Users</Header.Item>
            <Header.Item>
                <Header.Link href={route('about')}>About</Header.Link>
            </Header.Item>
            <Header.Item full></Header.Item>
            <Header.Item mr={0}>
                <Avatar src="https://github.com/octocat.png" size={20} square alt="@octocat" />
            </Header.Item>
        </Header>
    )
}

export default PageHeader