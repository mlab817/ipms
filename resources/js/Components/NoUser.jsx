import React from "react";
import {Box, Text} from "@primer/react";

const NoUser = () => {
    return (
        <Box
            p={3}
            display="flex"
            border={0}
            borderBottomWidth={1}
            borderColor="border.default"
            borderStyle="solid"
        >
            <Text>No User</Text>
        </Box>
    )
}

export default NoUser