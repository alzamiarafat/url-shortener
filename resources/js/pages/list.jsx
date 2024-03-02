export default function List({ urls }) {
    return (
        <>
            <div className="container mt-5">
                {urls &&
                    urls.map((item) => (
                        <ul class="list-group m-3" key={item.id}>
                            <li class="list-group-item p-3">
                                {item.shortened_url}
                            </li>
                        </ul>
                    ))}
            </div>
        </>
    );
}
