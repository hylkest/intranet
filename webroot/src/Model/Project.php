<?php
namespace src\Model;

class Project {
    private int $id;
    private string $projectName;
    private string $client;
    private string $projectStreet;
    private string $projectHouseNumber;
    private string $projectCity;
    private int $maxHours;
    private string $description;
    private int $spentHours;
    private string $status;
    private string $leader;
    private string $projectFase;
    private string $priority;

    public function __construct(
        string $projectName,
        string $projectStreet,
        string $projectHouseNumber,
        string $projectCity,
        string $client,
        string $priority,
        string $projectFase,
        int $maxHours,
        string $description,
        string $status,
        string $leader,
        int $id = 0,
        int $spentHours = 0
    ) {
        $this->id = $id;
        $this->projectName = $projectName;
        $this->projectStreet = $projectStreet;
        $this->projectHouseNumber = $projectHouseNumber;
        $this->projectCity = $projectCity;
        $this->client = $client;
        $this->priority = $priority;
        $this->projectFase = $projectFase;
        $this->maxHours = $maxHours;
        $this->description = $description;
        $this->status = $status;
        $this->leader = $leader;
        $this->spentHours = $spentHours;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getProjectAddress(): string {
        return $this->projectStreet . ' ' . $this->projectHouseNumber . ', ' . $this->projectCity;
    }

    public function getProjectName(): string {
        return $this->projectName;
    }

    public function getClient(): string {
        return $this->client;
    }

    public function getProjectStreet(): string {
        return $this->projectStreet;
    }

    public function getProjectHouseNumber(): string {
        return $this->projectHouseNumber;
    }

    public function getProjectCity(): string {
        return $this->projectCity;
    }

    public function getMaxHours(): int {
        return $this->maxHours;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getSpentHours(): int {
        return $this->spentHours;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getLeader(): string {
        return $this->leader;
    }

    public function getProjectFase(): string {
        return $this->projectFase;
    }

    public function getPriority(): string {
        return $this->priority;
    }

    // Setters (optioneel, indien nodig)
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setProjectName(string $projectName): void {
        $this->projectName = $projectName;
    }

    public function setClient(string $client): void {
        $this->client = $client;
    }

    public function setProjectStreet(string $projectStreet): void {
        $this->projectStreet = $projectStreet;
    }

    public function setProjectHouseNumber(string $projectHouseNumber): void {
        $this->projectHouseNumber = $projectHouseNumber;
    }

    public function setProjectCity(string $projectCity): void {
        $this->projectCity = $projectCity;
    }

    public function setMaxHours(int $maxHours): void {
        $this->maxHours = $maxHours;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setSpentHours(int $spentHours): void {
        $this->spentHours = $spentHours;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function setLeader(string $leader): void {
        $this->leader = $leader;
    }

    public function setProjectFase(string $projectFase): void {
        $this->projectFase = $projectFase;
    }

    public function setPriority(string $priority): void {
        $this->priority = $priority;
    }
}
