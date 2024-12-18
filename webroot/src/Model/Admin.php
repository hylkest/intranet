<?php
namespace src\Model;

class Admin {
    private int $id;
    private string $role_name;
    private int $role_usermanagement;
    private int $role_invoices;
    private int $role_quote;
    private int $role_projects;
    private int $role_agenda;
    private int $role_jobs;
    private int $role_certificates;
    private int $role_admin;

    public function __construct(int $id, string $role_name, int $role_usermanagement, int $role_invoices, int $role_quote, int $role_projects, int $role_agenda, int $role_jobs, int $role_certificates, int $role_admin) {
        $this->id = $id;
        $this->role_name = $role_name;
        $this->role_usermanagement = $role_usermanagement;
        $this->role_invoices = $role_invoices;
        $this->role_quote = $role_quote;
        $this->role_projects = $role_projects;
        $this->role_agenda = $role_agenda;
        $this->role_jobs = $role_jobs;
        $this->role_certificates = $role_certificates;
        $this->role_admin = $role_admin;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName(): string {
        return $this->role_name;
    }

    public function setRoleName(string $role_name): void {
        $this->role_name = $role_name;
    }

    public function getRoleUsermanagement(): int {
        return $this->role_usermanagement;
    }

    public function setRoleUsermanagement(int $role_usermanagement): void {
        $this->role_usermanagement = $role_usermanagement;
    }

    public function getRoleInvoices(): int {
        return $this->role_invoices;
    }

    public function setRoleInvoices(int $role_invoices): void {
        $this->role_invoices = $role_invoices;
    }

    public function getRoleQuote(): int {
        return $this->role_quote;
    }

    public function setRoleQuote(int $role_quote): void {
        $this->role_quote = $role_quote;
    }

    public function getRoleProjects(): int {
        return $this->role_projects;
    }

    public function setRoleProjects(int $role_projects): void {
        $this->role_projects = $role_projects;
    }

    public function getRoleAgenda(): int {
        return $this->role_agenda;
    }

    public function setRoleAgenda(int $role_agenda): void {
        $this->role_agenda = $role_agenda;
    }

    public function getRoleJobs(): int {
        return $this->role_jobs;
    }

    public function setRoleJobs(int $role_jobs): void {
        $this->role_jobs = $role_jobs;
    }

    public function getRoleCertificates(): int {
        return $this->role_certificates;
    }

    public function setRoleCertificates(int $role_certificates): void {
        $this->role_certificates = $role_certificates;
    }

    public function getRoleAdmin(): int {
        return $this->role_admin;
    }

    public function setRoleAdmin(int $role_admin): void {
        $this->role_admin = $role_admin;
    }
}
