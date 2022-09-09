import {
    CheckCircleIcon,
    ChevronRightIcon,
    CalendarIcon,
} from "@heroicons/react/20/solid";

const Gifts = ({ data }) => {
    console.log(data, 200);
    return (
        <div className="overflow-hidden bg-white shadow sm:rounded-md">
            <ul role="list" className="divide-y divide-gray-200">
                {data.map((gift) => (
                    <li key={gift.name}>
                        <a href="#" className="block hover:bg-gray-50">
                            <div className="flex items-center px-4 py-4 sm:px-6">
                                <div className="flex min-w-0 flex-1 items-center">
                                    <div className="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p className="truncate text-sm font-medium text-red-600">
                                                {gift.name}
                                            </p>
                                            <p className="mt-2 flex items-center text-sm text-gray-500">
                                                <CalendarIcon
                                                    className="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                    aria-hidden="true"
                                                />
                                                <span className="truncate">
                                                    {gift.start +
                                                        " - " +
                                                        gift.finish}
                                                </span>
                                            </p>
                                        </div>
                                        {gift.applicant != null && (
                                            <div className="block">
                                                <div>
                                                    <p className="text-sm text-gray-900">
                                                        {gift.applicant.name}
                                                    </p>
                                                    <p className="mt-2 flex items-center text-sm text-gray-500">
                                                        <CheckCircleIcon
                                                            className="mr-1.5 h-5 w-5 flex-shrink-0 text-green-400"
                                                            aria-hidden="true"
                                                        />
                                                        {"email: " +
                                                            gift.applicant
                                                                .email +
                                                            ",   tel:" +
                                                            gift.applicant
                                                                .phone}
                                                    </p>
                                                </div>
                                            </div>
                                        )}
                                    </div>
                                </div>
                                <div>
                                    <a
                                        href={route("gifts.draw", gift.id)}
                                        className="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    >
                                        {gift.applicant === null
                                            ? "Sorsolas"
                                            : "Ujra sorsolas"}
                                    </a>
                                </div>
                            </div>
                        </a>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Gifts;
