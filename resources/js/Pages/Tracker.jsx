import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import {
    ActionList,
    ActionMenu,
    Avatar,
    Box,
    IconButton,
    Label,
    Pagehead,
    Pagination,
    Text,
    Truncate
} from "@primer/react";
import {KebabHorizontalIcon, PencilIcon, TrashIcon} from "@primer/octicons-react";

const TrackerPage = ({ projects }) => {

    const { data, current_page, last_page } = projects

    return (
        <Authenticated>
            <Pagehead as="h3">Tracker</Pagehead>

            <Box>
                {
                    data.map(project => (
                        <Box display="flex" p={3} border={0} borderColor="border.default" borderBottomWidth={1} borderStyle="solid" key={project.id}>
                            <Box mr={3}>
                                <Avatar src={`/images/offices/${project.office.operating_unit.label}.png`} size={30} alt={project.office.operating_unit.label} />
                            </Box>
                            <Box>
                                <Text fontWeight="bold">
                                    {project.title}
                                </Text>
                                <Truncate title={project.description.description} maxWidth={[250, 200, 150]}>
                                    <Text color="fg.subtle">
                                        {project.description.description}
                                    </Text>
                                </Truncate>
                                <Text fontSize={12} color="fg.subtle">
                                    Added by @{project.creator.username} on {new Date(project.created_at).toLocaleDateString()}
                                </Text>
                            </Box>
                            <Box flexGrow={1} />
                            <Box mx={3}>
                                {project.trip === 1 && <Label variant="success">TRIP</Label>}
                            </Box>
                            <Box mx={3}>
                                {project.submission_status?.name}
                            </Box>
                            <Box mx={3}>
                                {project.pipol_status?.name }
                            </Box>
                            <Box mx={3}>
                                Reviewer
                            </Box>
                            <Box mx={3}>
                                {new Date(project.updated_at).toLocaleDateString()}
                            </Box>
                            <Box>
                                <ActionMenu>
                                    <ActionMenu.Anchor>
                                        <IconButton icon={KebabHorizontalIcon} variant="invisible" aria-label="Open column options" />
                                    </ActionMenu.Anchor>

                                    <ActionMenu.Overlay>
                                        <ActionList>
                                            <ActionList.Item>
                                                <ActionList.LeadingVisual>
                                                    <PencilIcon />
                                                </ActionList.LeadingVisual>
                                                Edit
                                            </ActionList.Item>
                                            <ActionList.Item variant="danger">
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

            <Box>
                <Pagination
                    pageCount={last_page}
                    currentPage={current_page}
                    hrefBuilder={page => route('tracker', { page: page })}
                />
            </Box>
        </Authenticated>
    )
}

export default TrackerPage
