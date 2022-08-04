import Authenticated from "@/Layouts/Authenticated";
import {Box, Button, FormControl, Select, TextInput} from "@primer/react";
import {useForm} from "@inertiajs/inertia-react";

const OfficesCreate = ({ operating_units }) => {
    const { data, setData, post } = useForm({
        name: '',
        ref_operating_unit_id: '',
        acronym: '',
        email: '',
        contact_numbers: '',
        office_head_name: '',
        office_head_position: ''

    })

    const handleChange = ({ target: { name, value }}) => setData(name, value)

    const handleSubmit = e => console.log(e)

    return (
        <Authenticated>
            {JSON.stringify(data)}
            <Box>
                <div className="Box-header">
                    <h3 className="Box-title">Create an Office</h3>
                </div>

                <form onSubmit={handleSubmit}>
                    <FormControl>
                        <FormControl.Label htmlFor="name">
                            Name
                        </FormControl.Label>
                        <TextInput type="text" className="form-control" name="name" id="name" placeholder="Name" value={data.name} onChange={handleChange} />
                    </FormControl>

                    <FormControl>
                        <FormControl.Label htmlFor="ref_operating_unit_id">Operating Unit</FormControl.Label>
                        <Select name="ref_operating_unit_id" id="ref_operating_unit_id" onChange={handleChange}>
                            {
                                operating_units.map(ou => <Select.Option value={ou.id} key={ou.id}>{ou.label}</Select.Option>)
                            }
                        </Select>
                    </FormControl>

                    <FormControl>
                        <FormControl.Label htmlFor="acronym">Acronym</FormControl.Label>
                        <TextInput type="text" name="acronym" id="acronym" placeholder="Acronym" value={data.acronym} onChange={handleChange}/>
                    </FormControl>

                    <FormControl>
                        <FormControl.Label htmlFor="email">Email</FormControl.Label>
                        <TextInput type="email" name="email" id="email" placeholder="Email (main email only)" value={data.email} onChange={handleChange} />
                    </FormControl>

                    <FormControl>
                        <FormControl.Label htmlFor="contact_numbers">Contact Nos.</FormControl.Label>
                        <TextInput type="text" name="contact_numbers" id="contact_numbers" placeholder="Contact Nos." value={data.contact_numbers} onChange={handleChange} />
                    </FormControl>

                    <FormControl>
                        <FormControl.Label htmlFor="office_head_name">Name of Office Head</FormControl.Label>
                        <TextInput type="text" name="office_head_name" id="office_head_name" placeholder="Name of Office Head" value={data.office_head_name}  onChange={handleChange} />
                    </FormControl>

                    <FormControl>
                        <FormControl.Label htmlFor="office_head_position" >Position of Office Head</FormControl.Label>
                        <TextInput type="text" name="office_head_position" id="office_head_position" placeholder="Position of Office Head" value={data.office_head_position}  onChange={handleChange} />
                    </FormControl>

                    <Button variant="primary" onClick={handleSubmit}>Submit</Button>
                </form>
            </Box>
        </Authenticated>
    )
}

export default OfficesCreate