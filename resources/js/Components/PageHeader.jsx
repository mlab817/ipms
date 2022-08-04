import React from "react";
import {Avatar, AvatarPair, Header, IconButton, StyledOcticon} from "@primer/react";
import {MarkGithubIcon, PlusIcon} from "@primer/octicons-react";
import {Head, usePage} from "@inertiajs/inertia-react";

const PageHeader = () => {
    const { appName, auth: { user } } = usePage().props

    console.log(user)

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
                <Header.Link href={route('tracker')}>Tracker</Header.Link>
            </Header.Item>
            <Header.Item>
                <Header.Link href={route('directory')}>Directory</Header.Link>
            </Header.Item>
            <Header.Item>
                <Header.Link href={route('about')}>Reports</Header.Link>
            </Header.Item>
            <Header.Item full></Header.Item>
            <Header.Item>
                <Header.Link href={route('projects.create')}>
                    New
                </Header.Link>
            </Header.Item>
            <Header.Item mr={0}>
                <AvatarPair>
                    <Avatar src={`/images/offices/${user.office.operating_unit.label}.png`} />
                    <Avatar src={user.avatar} size={30} alt={user.first_name} />
                </AvatarPair>
            </Header.Item>
        </Header>
    )
}

export default PageHeader
