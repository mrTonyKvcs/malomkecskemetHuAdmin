import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/inertia-react";
import Gifts from "@/Components/Lists/Gifts";

export default function Index(props) {
    const { gifts } = props;

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Nyeremenyjatek sorsolas
                </h2>
            }
        >
            <Head title="Nyeremeny sorsolas" />

            <Gifts data={gifts.data} />
        </AuthenticatedLayout>
    );
}
