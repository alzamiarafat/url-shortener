// resources/js/Pages/Create.jsx
import React, { useState } from "react";
import { router } from "@inertiajs/react"; // We need to import this router for making POST request with our form

export default function Create() {
    const [values, setValues] = useState({
        url: "",
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }

    // This function will send our form data to
    // store function of PostContoller
    function handleSubmit(e) {
        e.preventDefault();
        router.post("/url", values);
    }
    return (
        <div class="container mt-3">
            <form onSubmit={handleSubmit}>
                <div class="input-group">
                    <input
                        id="url"
                        name="url"
                        type="text"
                        value={values.url}
                        onChange={handleChange}
                        class="form-control p-3 mr-3"
                        placeholder="Enter link here"
                        aria-label="Enter link here"
                        aria-describedby="basic-addon2"
                        required
                    />
                    <div class="input-group-append">
                        <button class="btn btn-secondary p-3" type="submit">
                            Shorten URL
                        </button>
                    </div>
                </div>
            </form>
        </div>
    );
}
