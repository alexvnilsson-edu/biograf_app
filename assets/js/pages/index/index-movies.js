import React, { Component } from "react";
import axios from "axios";
import ReactDOM from "react-dom";

class IndexMoviesComponent extends Component {
  constructor() {
    super();

    this.state = {
      movies: [],
    };
  }

  getMovies() {
    axios({
      method: "get",
      url: `${window.APP_API_ENDPOINT}/api/movies/`,
    })
      .then(({ data }) => {
        if (data.items) {
          const movies = data.items;

          this.setState({ movies: [...this.state.movies, ...movies] });
        }
      })
      .catch((reason) => {});
  }

  componentDidMount() {
    this.getMovies();
  }

  render() {
    return (
      <div className="container px-0 my-5">
        <h2>Filmer</h2>

        {this.state.movies.map((item) => (
          <div
            key={item.id}
            className="d-inline-block shadow-sm"
            style={{ borderRadius: "0.25rem", overflow: "hidden" }}
          >
            <img
              alt={item.name}
              src={`${window.APP_API_ENDPOINT}/api/movies/${item.id}/cover`}
            />
          </div>
        ))}
      </div>
    );
  }
}

ReactDOM.render(
  <IndexMoviesComponent />,
  document.getElementById("index-movies-component")
);

export default IndexMoviesComponent;
