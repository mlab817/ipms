import Authenticated from "@/Layouts/Authenticated";
import {
    Box,
    Button,
    Checkbox,
    FormControl,
    Pagehead,
    Select,
    Spinner,
    TextInput
} from "@primer/react";
import {useForm} from "@inertiajs/inertia-react";

const ProjectsCreate = ({ offices, pap_types }) => {
    const { data, setData, post, processing, errors } = useForm({
        office_id: '',
        title: '',
        ref_pap_type_id: '',
        regular_program: false
    })

    const handleChange = ({ target }) => {
        console.log(target)
        setData(target.name, target.type === 'checkbox' ? target.checked : target.value)
    }

    const handleSubmit = e => {
        console.log(e)
        e.preventDefault()
        post(route('projects.store'), data)
    }

    return (
        <Authenticated>
            <Pagehead as="h2">Add a new PAP</Pagehead>
            {JSON.stringify(data)}

            <form onSubmit={handleSubmit}>
                <Box>
                    <FormControl id="office_id" sx={{ marginY: 3 }}>
                        <FormControl.Label htmlFor="office_id">
                            Office
                        </FormControl.Label>

                        <Select name="office_id" onChange={handleChange}>
                            {
                                offices.map(office => <Select.Option key={office.id} value={office.id}>{office.acronym}</Select.Option>)
                            }
                        </Select>
                    </FormControl>

                    <FormControl id="title" sx={{ marginY: 3 }}>
                        <FormControl.Label htmlFor="title">
                            Title
                        </FormControl.Label>

                        <TextInput name="title" onChange={handleChange} block />

                        <FormControl.Caption>
                            PAP Title must be unique to avoid duplication.
                        </FormControl.Caption>
                    </FormControl>

                    <FormControl id="ref_pap_type_id" sx={{ marginY: 3 }}>
                        <FormControl.Label htmlFor="ref_pap_type_id">
                            Program or Project
                        </FormControl.Label>

                        <Select name="ref_pap_type_id" onChange={handleChange}>
                            {
                                pap_types.map(option => <Select.Option key={option.id} value={option.id}>{option.name}</Select.Option>)
                            }
                        </Select>
                    </FormControl>

                    <FormControl sx={{ marginY: 3 }}>
                        <Checkbox name="regular_program" checked={data.regular_program} onChange={handleChange} />
                        <FormControl.Label>This PAP is a Regular Program.</FormControl.Label>
                    </FormControl>

                    <Button variant="primary" onClick={handleSubmit}>
                        { processing ? <Spinner size="small" /> : 'Submit' }
                    </Button>
                </Box>
            </form>
        </Authenticated>
    )
}

export default ProjectsCreate