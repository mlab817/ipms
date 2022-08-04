import Authenticated from "@/Layouts/Authenticated";
import {Box, Button, FormControl, Pagehead, Radio, RadioGroup, Select, Spinner, TextInput} from "@primer/react";
import {useForm} from "@inertiajs/inertia-react";

const ProjectsCreate = ({ offices, pap_types }) => {
    const { data, setData, post, processing } = useForm({
        office_id: '',
        title: '',
        ref_pap_type_id: ''
    })

    const handleChange = ({ target: { name, value }}) => setData(name, value)

    const handleSubmit = e => {
        e.preventDefault()
        post(route('projects.store'), data)
    }

    return (
        <Authenticated>
            <Pagehead as="h2">Add a new PAP</Pagehead>
            {JSON.stringify(data)}
            <form onSubmit={handleSubmit}>
                <Box>
                    <FormControl sx={{ marginY: 3 }}>
                        <FormControl.Label htmlFor="office_id">
                            Office
                        </FormControl.Label>

                        <Select id="office_id" name="office_id" onChange={handleChange}>
                            {
                                offices.map(office => <Select.Option key={office.id} value={office.id}>{office.acronym}</Select.Option>)
                            }
                        </Select>
                    </FormControl>

                    <FormControl sx={{ marginY: 3 }}>
                        <FormControl.Label htmlFor="title">
                            Title
                        </FormControl.Label>

                        <TextInput id="title" name="title" onChange={handleChange} block />

                        <FormControl.Caption>
                            PAP Title must be unique to avoid duplication.
                        </FormControl.Caption>
                    </FormControl>

                    <FormControl sx={{ marginY: 3 }}>
                        <FormControl.Label htmlFor="ref_pap_type_id">
                            Program or Project
                        </FormControl.Label>

                        <Select id="ref_pap_type_id" name="ref_pap_type_id" onChange={handleChange}>
                            {
                                pap_types.map(option => <Select.Option key={option.id} value={option.id}>{option.name}</Select.Option>)
                            }
                        </Select>
                    </FormControl>

                    <Button>
                        { processing ? <Spinner size="small" /> : 'Submit' }
                    </Button>
                </Box>
            </form>
        </Authenticated>
    )
}

export default ProjectsCreate