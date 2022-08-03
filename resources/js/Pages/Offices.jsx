import React, {useState} from "react";
import Authenticated from "@/Layouts/Authenticated";
import {Box, TextInput} from "@primer/react";
import {SearchIcon} from "@primer/octicons-react";

const OfficesIndex = ({ offices }) => {
    const [search, setSearch] = useState('')

    console.log(offices)

    const handleSearchChange = ({ target: { value } }) => setSearch(value)

    const { data, current_page, last_page } = offices

    return (
        <Authenticated>
            <Box>
                <TextInput
                    leadingVisual={SearchIcon}
                    value={search}
                    onChange={handleSearchChange}
                    block
                />
            </Box>

            <Box>
                {
                    data.map((office) => (
                        <Box key={office.id}>
                            {office.name}
                        </Box>
                    ))
                }
            </Box>
        </Authenticated>
    )
}

export default OfficesIndex