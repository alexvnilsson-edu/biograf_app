import React, { Component } from "react";
import axios from "axios";
import ReactDOM from "react-dom";
import "../../css/app.scss";
import "@fortawesome/fontawesome-free/js/all.js";

const FORM_DEFAULTS = {
  email: "",
  password: "",
};

class CustomerLogin extends Component {
  constructor() {
    super();

    this.state = {
      form: FORM_DEFAULTS,
      formSubmitted: false,
      formAccepted: false,
    };

    this.handleFormChange = this.handleFormChange.bind(this);
    this.handleFormSubmit = this.handleFormSubmit.bind(this);
  }

  componentDidMount() {}

  handleFormChange(e) {
    if (typeof e === "undefined") {
      throw Error(`Behöver ett argument av typen Event.`);
    }

    if (typeof e.target === "undefined") {
      throw Error(`Behöver ett mål.`);
    }

    if (typeof e.target.name === "undefined") {
      throw Error(`Behöver ett namn som referens till klass.`);
    }

    const field = e.target.name;
    const affect = {};
    affect[field] = e.target.value;
    const newFormState = Object.assign(this.state.form, affect);
    this.setState({ form: newFormState });
  }

  handleFormSubmit(e) {
    console.log("Skickar data till server:", this.state.form);

    axios({
      method: "post",
      url: `${window.APP_API_ENDPOINT}/api/medlemmar/loggain`,
      data: this.state.form,
    })
      .then((response) => {
        this.setState({
          formSubmitted: true,
          formAccepted: true,
          form: FORM_DEFAULTS,
        });
        console.log("Svar från server:", this.state.member);
      })
      .catch((reason) => {
        console.error("Felsvar från server:", reason);
        this.setState({ formSubmitted: true, formAccepted: false });
      });

    e.preventDefault();
  }

  handleFormFinished() {
    const fullName = `${this.state.member.firstname} ${
      this.state.member.surname || ""
    }`.trim();

    return (
      <div className="container my-5">
        <div className="container p-3 bg-light">
          <h2>Tack {fullName}!</h2>

          <h4>Du är nu registrerad!</h4>

          <div className="d-flex justify-content-center mt-3">
            <a href="/" className="btn btn-primary">
              Logga in
            </a>
          </div>
        </div>
      </div>
    );
  }

  render() {
    return (
      <div className="container my-5">
        <form onSubmit={this.handleFormSubmit}>
          <div className="d-flex mb-3 flex-row justify-space-between align-items-center">
            <a
              href="/"
              className="d-flex flex-row align-items-center px-2 mr-2"
            >
              <i className="fas fa-chevron-left fa-lg" />
            </a>
            <h1 className="my-0">Inloggning för medlemmar</h1>
          </div>
          <div className="container p-3 bg-light" style={{ maxWidth: "25em" }}>
            <h3 className="mt-0 mb-3 text-dark">Inloggningsuppgifter</h3>

            <div className="form-group">
              <input
                type="email"
                className="form-control"
                name="email"
                placeholder="E-postadress"
                required
                value={this.state.form.email}
                onChange={this.handleFormChange}
              />
            </div>

            <div className="form-group">
              <input
                type="password"
                className="form-control"
                name="password"
                placeholder="Lösenord"
                required
                value={this.state.form.password}
                onChange={this.handleFormChange}
              />
            </div>

            <div className="d-flex justify-content-end mt-1">
              <button type="submit" className="btn btn-primary">
                Logga in
              </button>
            </div>
          </div>
        </form>
      </div>
    );
  }
}

ReactDOM.render(<CustomerLogin />, document.getElementById("root"));

export default CustomerLogin;
