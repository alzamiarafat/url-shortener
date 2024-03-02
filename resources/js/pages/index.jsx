import Navbar from "../components/navbar";
import Create from "./create";
import List from "./list";

export default function Index({ urls }) {
    return (
        <>
            <Navbar></Navbar>
            <div className="container mt-5">
                <h1 className="font-weight-bold text-center">
                    Free URL Shortener
                </h1>
                <Create></Create>
                <List urls={urls}></List>
            </div>
        </>
    );
}
