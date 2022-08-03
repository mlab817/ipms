import React, {useState} from "react";
import Authenticated from "@/Layouts/Authenticated";
import {Box, Heading, Pagination, TextInput} from "@primer/react";
import {SearchIcon} from "@primer/octicons-react";

const Directory = ({ offices }) => {
    const [search, setSearch] = useState('')

    const handleSearchChange = ({ target: { value } }) => setSearch(value)

    console.log(offices)

    const { data, current_page, last_page } = offices

    const onPageChange = (e) => console.log(e)

    const hrefBuilder = page => route('directory', { page: page })

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

            <Box mt={3}>
                <TextInput block leadingVisual={SearchIcon} onChange={handleSearchChange} value={search} />
            </Box>

            <Box>
                {
                    data.map((office) => (
                        <Box
                            mt={3}
                            key={office.id}
                            p={3}
                            border={1}
                            borderColor="border.default"
                            borderStyle="solid">
                            <Heading as="h4" sx={{ fontSize: 16 }}>
                                {office.name}
                            </Heading>
                            {JSON.stringify(office)}
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