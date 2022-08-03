import React, {useState} from "react";
import Authenticated from "@/Layouts/Authenticated";
import {
    ActionMenu,
    ActionList,
    Box,
    Heading,
    Pagination,
    TextInput,
    Avatar,
    Text,
    IconButton
} from "@primer/react";
import { Link } from "@inertiajs/inertia-react";
import { KebabHorizontalIcon, PencilIcon, SearchIcon, TrashIcon} from "@primer/octicons-react";

const Directory = ({ offices }) => {
    const [search, setSearch] = useState('')

    const handleSearchChange = ({ target: { value } }) => setSearch(value)

    console.log(offices)

    const { data, current_page, last_page } = offices

    const onPageChange = (e) => console.log(e)

    const hrefBuilder = page => route('directory', { page: page })

    const editOffice = office => console.log(office)

    return (
        <Authenticated>
            <Box
                border={0}
                borderBottomWidth={1}
                borderColor="border.default"
                borderStyle="solid"
            >
                <Heading as="h2">Directory</Heading>
            </Box>

            <Box mt={3} display="flex">
                <TextInput block leadingVisual={SearchIcon} onChange={handleSearchChange} value={search} />

                <Box ml={3}>
                    <ActionMenu>
                        <ActionMenu.Button>Sort</ActionMenu.Button>

                        <ActionMenu.Overlay>
                            <ActionList>
                                <ActionList.Item onSelect={event => console.log('New file')}>New file</ActionList.Item>
                                <ActionList.Item>Copy link</ActionList.Item>
                                <ActionList.Item>Edit file</ActionList.Item>
                                <ActionList.Divider />
                                <ActionList.Item variant="danger">Delete file</ActionList.Item>
                            </ActionList>
                        </ActionMenu.Overlay>
                    </ActionMenu>
                </Box>
            </Box>

            <Box>
                {
                    data.map((office) => (
                        <Box
                            mt={3}
                            key={office.id}>
                            <Heading as="h4" sx={{ fontSize: 16 }}>
                                <span onClick={() => editOffice(office)}>
                                    {office.name}
                                </span>
                            </Heading>
                            {
                                office.users.map(user => (
                                    <Box
                                        key={user.id}
                                        p={3}
                                        display="flex"
                                        border={0}
                                        borderBottomWidth={1}
                                        borderColor="border.default"
                                        borderStyle="solid"
                                    >
                                        <Box mr={3}>
                                            <Avatar src={user.avatar} size={36} />
                                        </Box>
                                        <Box>
                                            <Text fontWeight="bold">
                                                {`${user.first_name} ${user.last_name}`}
                                            </Text> <br/>
                                            <Text color="fg.muted">
                                                @{user.username} &#183; @{user.email}
                                            </Text> <br/>
                                            <Text color="fg.subtle" fontSize={12}>
                                                Member since {new Date(user.created_at).toDateString()}
                                            </Text>
                                        </Box>
                                        <Box flexGrow={1}>
                                            {/*{JSON.stringify(user)}*/}
                                        </Box>
                                        <Box>
                                            <ActionMenu>
                                                <ActionMenu.Anchor>
                                                    <IconButton icon={KebabHorizontalIcon} variant="invisible" aria-label="Open column options" />
                                                </ActionMenu.Anchor>

                                                <ActionMenu.Overlay>
                                                    <ActionList>
                                                        <ActionList.LinkItem>
                                                            <Link href={route('users.edit', user)}>
                                                                <ActionList.LeadingVisual>
                                                                    <PencilIcon />
                                                                </ActionList.LeadingVisual>
                                                                Edit
                                                            </Link>
                                                        </ActionList.LinkItem>
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
                    ))
                }
            </Box>

            <Pagination
                pageCount={last_page}
                currentPage={current_page}
                onPageChange={onPageChange}
                hrefBuilder={hrefBuilder}
            />
        </Authenticated>
    )
}

export default Directory