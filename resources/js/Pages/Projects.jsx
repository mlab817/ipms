import React, {useState} from "react";
import Authenticated from "@/Layouts/Authenticated";
import {
    ActionMenu,
    ActionList,
    Box,
    Checkbox,
    Link,
    Pagination,
    Text,
    TextInput,
    IconButton, Avatar, Heading, StyledOcticon
} from "@primer/react";
import {
    AlertIcon,
    KebabHorizontalIcon,
    LinkIcon,
    PencilIcon,
    SearchIcon,
    TrashIcon, XIcon
} from "@primer/octicons-react";
import * as OcticonsReact from "@primer/octicons-react"
import {usePage} from "@inertiajs/inertia-react";

const ProjectsIndex = ({ projects, submission_statuses }) => {
    const { ziggy: { location } } = usePage().props

    const [search, setSearch] = useState('')

    const handleSearchChange = ({ target: { value } }) => setSearch(value)

    const { data, current_page, last_page } = projects

    const onPageChange = (e) => console.log(e)

    const hrefBuilder = page => route('projects.index', { page: page })

    const confirmDelete = project => {
        // TODO: Update with delete logic
        if (confirm('Are you sure you want to delete this PAP?')) {
            console.log(project)
        } else {
            console.log('cancelled')
        }
    }

    const getIcon = icon => icon ? OcticonsReact[icon] : XIcon

    return (
        <Authenticated>
            <Box>
                <TextInput
                    leadingVisual={SearchIcon}
                    block
                    value={search}
                    placeholder="Search"
                    onChange={handleSearchChange} />
            </Box>
            <Box display="flex" mt={3}>
                <Box mr={3}>
                    <Heading as="h4" sx={{ fontSize: 16 }}>
                        Submission Status
                    </Heading>
                    <ActionList>
                        {
                            submission_statuses.map(submission_status => (
                                <ActionList.Item key={submission_status.id}>
                                    <ActionList.LeadingVisual>
                                        <StyledOcticon icon={getIcon(submission_status.icon)} />
                                    </ActionList.LeadingVisual>
                                    {submission_status.name}
                                </ActionList.Item>
                            ))
                        }
                    </ActionList>
                </Box>
                <Box flexGrow={1} borderTopLeftRadius={2} borderTopRightRadius={2}>
                    <Box display="flex" flexDirection="column">
                        <Heading as="h4" sx={{ fontSize: 16 }}>Projects</Heading>

                        {
                            data.map((project) => (
                                <Box
                                    display="flex"
                                    border={0}
                                    borderBottomWidth={1}
                                    borderStyle="solid"
                                    borderColor="border.default"
                                    key={project.id}
                                    paddingX={3}
                                    paddingY={2}>
                                    <Box mr={2}>
                                        <Checkbox id={project.id} />
                                    </Box>
                                    <Box>
                                        <Text as="p" fontWeight="bold">
                                            <Link href={route('projects.show', project)}>
                                                {project.title}
                                            </Link>
                                        </Text>
                                        <Text color="fg.muted">
                                            @{project.creator.username}
                                        </Text>
                                    </Box>
                                    <Box flexGrow={1}></Box>
                                    <Box>
                                        <ActionMenu>
                                            <ActionMenu.Anchor>
                                                <IconButton icon={KebabHorizontalIcon} variant="invisible" aria-label="Open column options" />
                                            </ActionMenu.Anchor>

                                            <ActionMenu.Overlay>
                                                <ActionList>
                                                    <ActionList.LinkItem href={route('projects.edit', project)}>
                                                        <ActionList.LeadingVisual>
                                                            <PencilIcon />
                                                        </ActionList.LeadingVisual>
                                                        Edit
                                                    </ActionList.LinkItem>
                                                    <ActionList.Item variant="danger" onClick={() => confirmDelete(project)}>
                                                        <ActionList.LeadingVisual>
                                                            <TrashIcon />
                                                        </ActionList.LeadingVisual>
                                                        Delete
                                                    </ActionList.Item>
                                                </ActionList>
                                            </ActionMenu.Overlay>
                                        </ActionMenu>
                                    </Box>
                                </Box>
                            ))
                        }
                    </Box>

                    <Pagination
                        pageCount={last_page}
                        currentPage={current_page}
                        onPageChange={onPageChange}
                        hrefBuilder={hrefBuilder}
                    />
                </Box>
            </Box>
        </Authenticated>
    )
}

export default ProjectsIndex